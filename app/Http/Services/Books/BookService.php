<?php
namespace App\Http\Services\Books;

use App\Models\Book;
use App\Models\Menu;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Book_Author;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;

class BookService
{
    // Hỗ trợ hàm create
    public function getMenu()
    {
        // return Menu::where('menu_active', 1)->where('menu_parent_id', '!=', 0)->get();

        return Menu::where('menu_active', 1)->get();
    }

    public function getPublisher()
    {
        return Publisher::where('publisher_active', 1)->get();
    }

    public function getAuthor()
    {
        return Author::where('author_active', 1)->get();
    }

    // Đếm số lượng Sách
    public function count() {
        return Book::select('book_id')->count();
    }

    // Hàm kiểm tra giá gốc >= giá giảm
    protected function isValidPrice($request) {
        if ($request->input('book_price') != 0 && $request->input('book_price_sale') != 0 
        && $request->input('book_price_sale') >= $request->input('book_price')) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('book_price_sale') != 0 && (int)$request->input('book_price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }
        return true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $data = array();
            $data['book_name'] = $request->book_name;
            $data['book_description'] = $request->book_description;
            
            $data['book_format'] = $request->book_format;
            $data['book_pages'] = $request->book_pages;
            $data['book_weight'] = $request->book_weight;
            $data['book_publishing_year'] = $request->book_publishing_year;
    
            $data['book_price'] = $request->book_price;
            $data['book_price_sale'] = $request->book_price_sale;
    
            $data['menu_id'] = $request->menu_id;
            $data['publisher_id'] = $request->publisher_id;
    
            $data['book_active'] = $request->book_active;
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            $get_thumb = $request->file('book_thumb');
    
            $get_name_thumb = $get_thumb->getClientOriginalName();
            $name_thumb = current(explode('.', $get_name_thumb));
            $new_thumb = $name_thumb . '_' . strtotime(date('Y-m-d H:i:s')) . '.' . $get_thumb->getClientOriginalExtension();
            $get_thumb->move('storage\app\public\uploads-book', $new_thumb);
            $data['book_thumb'] = $new_thumb;

            // insertGetId: lấy luôn dữ liệu vừa mới insert
            $book_id = DB::table('books')->insertGetId($data);

            // Thêm Book_Author
            $sach_tacgia = $request->author_id;
            foreach ($sach_tacgia as $value) {
                $data_sach_tacgia['book_id'] = $book_id;
                $data_sach_tacgia['author_id'] = $value;
                $data_sach_tacgia['created_at'] = Carbon::now();
                $data_sach_tacgia['updated_at'] = Carbon::now();

                DB::table('book_authors')
                    ->insert($data_sach_tacgia);
            }

            Session::flash('success', 'Thêm Sách thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            // Ghi log (ghi lỗi)
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    // Lấy tất cả Sách
    public function get()
    {
        return Book::with('menu')->with('publisher')
            ->orderByDesc('book_id')
            ->paginate(8);
    }

    public function getBook_Authors()
    {
        return DB::table('book_authors')
            ->join('books', 'book_authors.book_id', '=', 'books.book_id')
            ->join('authors', 'book_authors.author_id', '=', 'authors.author_id')
            ->select('books.*', 'book_authors.book_id', 'authors.author_id', 'authors.author_name')
            ->get();
    }

    public function update($request, $book): bool
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $data = array();
            $data['book_name'] = $request->book_name;
            $data['book_description'] = $request->book_description;
            
            $data['book_format'] = $request->book_format;
            $data['book_pages'] = $request->book_pages;
            $data['book_weight'] = $request->book_weight;
            $data['book_publishing_year'] = $request->book_publishing_year;
    
            $data['book_price'] = $request->book_price;
            $data['book_price_sale'] = $request->book_price_sale;
    
            $data['menu_id'] = $request->menu_id;
            $data['publisher_id'] = $request->publisher_id;
            // $data['author_id'] = $request->author_id;
    
            $data['book_active'] = $request->book_active;
            $data['updated_at'] = Carbon::now();
            $get_thumb = $request->file('book_thumb');

            if ($get_thumb) {
                $destinationPath = 'storage/app/public/uploads-book/' . $book->book_thumb;
                if (file_exists($destinationPath)) {
                    unlink($destinationPath);
                }

                $get_name_thumb = $get_thumb->getClientOriginalName();
                $name_thumb = current(explode('.', $get_name_thumb));
                $new_thumb = $name_thumb . '_' . strtotime(date('Y-m-d H:i:s')) . '.' . $get_thumb->getClientOriginalExtension();
                $get_thumb->move('storage\app\public\uploads-book', $new_thumb);
                $data['book_thumb'] = $new_thumb;
            }

            DB::table('books')
                ->where('book_id', $book->book_id)
                ->update($data);

            Session::flash('success', 'Cập nhật Sách thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($book)
    {
        try {
            $destinationPath = 'storage/app/public/uploads-book/' . $book->book_thumb;
            if (file_exists($destinationPath)) {
                unlink($destinationPath);
            }

            DB::table('books')
                ->where('book_id', $book->book_id)
                ->delete();

            Session::flash('success', 'Xóa Sách thành công');

        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            // Ghi log (ghi lỗi)
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    // User Page
    const LIMIT = 4;

    public function getAll()
    {
        return Book::select('book_id', 'book_name', 'book_price_sale', 'book_thumb')
            ->where('book_active', 1)
            ->orderbyDesc('book_id')
            ->paginate(8);
    }

    public function get12()
    {
        return Book::select('book_id', 'book_name', 'book_price_sale', 'book_thumb')
            ->where('book_active', 1)
            ->orderbyDesc('book_id')
            ->paginate(12);
    }

    public function show($id)
    {
        return Book::where('book_id', $id)
            ->where('book_active', 1)
            ->with('menu')
            ->with('publisher')
            ->firstOrFail();
    }

    public function getBookById($id)
    {
        return DB::table('book_authors')
            ->join('books', 'book_authors.book_id', '=', 'books.book_id')
            ->join('authors', 'book_authors.author_id', '=', 'authors.author_id')
            ->select('authors.author_id', 'authors.author_name')
            ->where('books.book_id', $id)
            ->get();
    }

    public function showBookRelated($id, $menu_id) {
        return Book::select('book_id', 'book_name', 'book_price_sale', 'book_thumb')
            ->where('menu_id', $menu_id)
            ->where('book_id', '!=', $id)
            ->where('book_active', 1)
            ->orderbyDesc('book_id')
            ->get();
    }

    public function search($keyword) {
        return DB::table('book_authors')
            ->join('books', 'book_authors.book_id', '=', 'books.book_id')
            ->join('authors', 'book_authors.author_id', '=', 'authors.author_id')
            ->select('books.book_id', 'books.book_name', 'books.book_price_sale', 'books.book_thumb')
            ->where('books.book_name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('authors.author_name', 'LIKE', '%' . $keyword . '%')
            ->where('book_active', 1)
            ->distinct('books.book_id')
            ->paginate(8);
    }

    // public function showBookAjax($data) {
    //     return Book::where('book_active', 1)
    //     ->where('book_name', 'LIKE', '%' . $data['query'] . '%')
    //     ->where('book_name', 1)
    //     ->get();
    // }

    // Xem sách bằng modal
    public function quickView($request)
    {
        $book_id = $request->book_id;

        $output['author_name'] = DB::table('book_authors')
        ->join('books', 'book_authors.book_id', '=', 'books.book_id')
        ->join('authors', 'book_authors.author_id', '=', 'authors.author_id')
        ->select('authors.author_name')
        ->where('books.book_id', $book_id)
        ->distinct('books.book_id')
        ->get();

        $book = Book::find($book_id);

        $output['book_thumb'] = $book->book_thumb;
        $output['book_name'] = $book->book_name;
        $output['book_description'] = $book->book_description;

        $output['book_format'] = $book->book_format;
        $output['book_pages'] = $book->book_pages;
        $output['book_weight'] = $book->book_weight;
        $output['book_publishing_year'] = $book->book_publishing_year;
        $output['book_price_sale'] = $book->book_price_sale;

        return $output;
    }
}