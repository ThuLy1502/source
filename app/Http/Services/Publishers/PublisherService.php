<?php
namespace App\Http\Services\Publishers;

use App\Models\Publisher;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DB;

class PublisherService
{
    public function create($request)
    {
        try {
            Publisher::create([
                'publisher_name' => (string)$request->input('publisher_name'),
                'publisher_description' => (string)$request->input('publisher_description'),
                'publisher_active' => (string)$request->input('publisher_active')
            ]);

            Session::flash('success', 'Thêm NXB thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function getAll()
    {
        return Publisher::orderbyDesc('publisher_id')->paginate(10);
    }

    // Đếm số lượng NXB
    public function count() {
        return Publisher::select('publisher_id')->count();
    }

    public function destroy($publisher)
    {
        try {
            DB::table('publishers')
                ->where('publisher_id', $publisher->publisher_id)
                ->delete();

            Session::flash('success', 'Xóa NXB thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            // Ghi log (ghi lỗi)
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $publisher): bool
    {
        try {
            $publisher->publisher_name = (string)$request->input('publisher_name');
            $publisher->publisher_description = (string)$request->input('publisher_description');
            $publisher->publisher_active = (string)$request->input('publisher_active');
            $publisher->save();

            Session::flash('success', 'Cập nhật NXB thành công');
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
        return Publisher::select('publisher_name', 'publisher_id')
            ->where('publisher_active', 1)
            ->orderbyDesc('publisher_id')
            ->get();
    }

    // Dùng id để lấy id của NXB, nếu không có nó sẽ báo lỗi 404 là không tìm thấy
    public function getId($id)
    {
        return Publisher::where('publisher_id', $id)->where('publisher_active', 1)->firstOrFail();
    }

    public function getBook($publisher)
    {
        // books(): hasMany trong Publisher Model
        return $publisher->books()
            ->select('book_id', 'book_name', 'book_price_sale', 'book_thumb')
            ->where('book_active', 1)
            ->orderbyDesc('book_id')
            ->paginate(8);
    }
}