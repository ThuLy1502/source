<?php
namespace App\Http\Services\Authors;

use App\Models\Author;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;

class AuthorService
{
    public function insert($request)
    {
        try {
            $data = array();
            $data['author_name'] = $request->author_name;
            $data['author_description'] = $request->author_description;
            $data['author_active'] = $request->author_active;
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            $get_thumb = $request->file('author_thumb');
    
            // Lưu ý: enctype="multipart/form-data" -> thêm vào form bên add_product.blade.php khi thêm hình ảnh
            
            // getClientOriginalName(): lấy tên của hình ảnh
            $get_name_thumb = $get_thumb->getClientOriginalName();

            // current(explode('.', $get_name_thumb)) -> phân tách chuỗi(tên hình ảnh) dựa vào dấu '.' và truyền vào biến $get_name_thumb để tách
            // VD: adidas123.jpg -> current sẽ lấy tên đầu là "adidas123", end sẽ lấy phần sau "jpg"
            $name_thumb = current(explode('.', $get_name_thumb));

            // getClientOriginalExtension(): lấy đuôi mở rộng của hình ảnh(.jpg, .png, .jpeg)
            $new_thumb = $name_thumb . rand(0, 999) . '.' . $get_thumb->getClientOriginalExtension();

            // move = move_uploaded_file
            $get_thumb->move('storage\app\public\uploads-author', $new_thumb);
            $data['author_thumb'] = $new_thumb;
            DB::table('authors')
                ->insert($data);

            Session::flash('success', 'Thêm Tác giả thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            // Ghi log (ghi lỗi)
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function getAll()
    {
        return Author::orderbyDesc('author_id')->paginate(8);
    }

    // Đếm số lượng Tác Giả
    public function count() {
        return Author::select('author_id')->count();
    }

    public function update($request, $author): bool
    {
        try {
            $data = array();
            $data['author_name'] = $request->author_name;
            $data['author_description'] = $request->author_description;
            $data['author_active'] = $request->author_active;
            $data['updated_at'] = Carbon::now();
            $get_thumb = $request->file('author_thumb');
            
            if ($get_thumb) {
                // Xóa link hình cũ khi cập nhật hình mới
                $destinationPath = 'storage/app/public/uploads-author/' . $author->author_thumb;
                if (file_exists($destinationPath)) {
                    unlink($destinationPath);
                }

                $get_name_thumb = $get_thumb->getClientOriginalName();
                $name_thumb = current(explode('.', $get_name_thumb));
                $new_thumb = $name_thumb . rand(0, 999) . '.' . $get_thumb->getClientOriginalExtension();
                $get_thumb->move('storage\app\public\uploads-author', $new_thumb);
                $data['author_thumb'] = $new_thumb;
            }

            DB::table('authors')
                ->where('author_id', $author->author_id)
                ->update($data);

            Session::flash('success', 'Cập nhật Tác giả thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            // Ghi log (ghi lỗi)
            \Log::info($err->getMessage());
            return false;
        }
        
        return true;
    }

    public function destroy($author)
    {
        try {
            // Xóa link hình tác giả khi xóa tác giả khỏi danh sách
            $destinationPath = 'storage/app/public/uploads-author/' . $author->author_thumb;
            if (file_exists($destinationPath)) {
                unlink($destinationPath);
            }

            DB::table('authors')
                ->where('author_id', $author->author_id)
                ->delete();

            Session::flash('success', 'Xóa Tác giả thành công');

        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            // Ghi log (ghi lỗi)
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    // User Page
    public function show()
    {
        return Author::select('author_name', 'author_id', 'author_thumb')
            ->where('author_active', 1)
            ->orderbyDesc('author_id')
            ->get();
    }

    public function getId($id)
    {
        return Author::where('author_id', $id)->where('author_active', 1)->firstOrFail();
    }

    public function getBook($author_id)
    {
        return DB::table('book_authors')
            ->join('books', 'book_authors.book_id', '=', 'books.book_id')
            ->join('authors', 'book_authors.author_id', '=', 'authors.author_id')
            ->select('books.book_id', 'books.book_name', 'books.book_price_sale', 'books.book_thumb')
            ->where('authors.author_id', $author_id)
            ->distinct('books.book_id')
            ->orderbyDesc('books.book_id')
            ->get();
    }
}