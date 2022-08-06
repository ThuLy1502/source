<?php
namespace App\Http\Services\News;

use App\Models\News;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;

class NewService
{
    public function insert($request)
    {
        try {
            $data = array();
            $data['new_title'] = $request->new_title;
            $data['new_description'] = $request->new_description;
            $data['new_content'] = $request->new_content;
            $data['new_active'] = $request->new_active;
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            $get_thumb = $request->file('new_thumb');

            $get_name_thumb = $get_thumb->getClientOriginalName();
            $name_thumb = current(explode('.', $get_name_thumb));
            $new_thumb = $name_thumb . '_' . strtotime(date('Y-m-d H:i:s')) . '.' . $get_thumb->getClientOriginalExtension();
            $get_thumb->move('storage\app\public\uploads-new', $new_thumb);
            $data['new_thumb'] = $new_thumb;

            DB::table('news')
                ->insert($data);

            Session::flash('success', 'Thêm Tin tức thành công');
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
        return News::orderbyDesc('new_id')->paginate(4);
    }

    // Đếm số lượng Tin Tức
    public function count() {
        return News::select('new_id')->count();
    }

    public function update($request, $new): bool
    {
        try {
            $data = array();
            $data['new_title'] = $request->new_title;
            $data['new_description'] = $request->new_description;
            $data['new_content'] = $request->new_content;
            $data['new_active'] = $request->new_active;
            $data['updated_at'] = Carbon::now();
            $get_thumb = $request->file('new_thumb');
            
            // Xóa thumb hình cũ khỏi uploads-new, cập nhật thumb hình mới
            $destinationPath = 'storage/app/public/uploads-new/' . $new->new_thumb;
            if (file_exists($destinationPath)) {
                unlink($destinationPath);
            }
    
            $get_name_thumb = $get_thumb->getClientOriginalName();
            $name_thumb = current(explode('.', $get_name_thumb));
            $new_thumb = $name_thumb . '_' . strtotime(date('Y-m-d H:i:s')) . '.' . $get_thumb->getClientOriginalExtension();
            $get_thumb->move('storage\app\public\uploads-new', $new_thumb);
            $data['new_thumb'] = $new_thumb;
    
            DB::table('news')
                ->where('new_id', $new->new_id)
                ->update($data);
    
            Session::flash('success', 'Cập nhật Tin tức thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            // Ghi log (ghi lỗi)
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function destroy($new)
    {
        try {
            // Xóa link hình tác giả khi xóa tác giả khỏi danh sách
            $destinationPath = 'storage/app/public/uploads-new/' . $new->new_thumb;
            if (file_exists($destinationPath)) {
                unlink($destinationPath);
            }

            DB::table('news')
                ->where('new_id', $new->new_id)
                ->delete();

            Session::flash('success', 'Xóa Tin tức thành công');
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
        return News::select('new_id', 'new_title', 'new_description', 'new_thumb', 'updated_at')
            ->where('new_active', 1)
            ->orderbyDesc('new_id')
            ->paginate(4);
    }

    public function get()
    {
        return News::select('new_id', 'new_title', 'new_description', 'new_thumb', 'updated_at')
            ->where('new_active', 1)
            ->orderbyDesc('new_id')
            ->paginate(8);
    }

    public function getId($id)
    {
        return News::where('new_id', $id)
            ->where('new_active', 1)
            ->firstOrFail();
    }

    public function showById($id)
    {
        return News::select('new_id', 'new_title', 'new_thumb', 'updated_at')
            ->where('new_id', '!=', $id)
            ->where('new_active', 1)
            ->orderbyDesc('new_id')
            ->get();
    }
}