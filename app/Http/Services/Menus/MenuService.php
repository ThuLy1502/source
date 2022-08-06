<?php
namespace App\Http\Services\Menus;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DB;

class MenuService
{
    // Lấy tất cả danh mục cha
    public function getParent()
    {
        return Menu::where('menu_parent_id', 0)->get();
    }

    // Lấy danh mục con theo id cha
    public function getChildren($menu)
    {
        return Menu::select('menu_id')
            ->where('menu_parent_id', $menu)
            ->get();
    }

    public function getAll()
    {
        return Menu::orderbyDesc('menu_id')->paginate(12);
    }

    // Đếm số lượng Danh mục
    public function count() {
        return Menu::select('menu_id')->count();
    }

    public function create($request)
    {
        try {
            Menu::create([
                'menu_name' => (string)$request->input('menu_name'),
                'menu_parent_id' => (int)$request->input('menu_parent_id'),
                'menu_description' => (string)$request->input('menu_description'),
                'menu_active' => (string)$request->input('menu_active')
            ]);

            Session::flash('success', 'Thêm Danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $menu): bool
    {
        try {
            if ($request->input('menu_parent_id') != $menu->menu_id) {
                $menu->menu_parent_id = (int)$request->input('menu_parent_id');
            }
    
            $menu->menu_name = (string)$request->input('menu_name');
            $menu->menu_description = (string)$request->input('menu_description');
            $menu->menu_active = (string)$request->input('menu_active');
            $menu->save();
    
            Session::flash('success', 'Cập nhật Danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            // Ghi log (ghi lỗi)
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function destroy($menu)
    {
        try {
            DB::table('menus')
                ->where('menu_id', $menu->menu_id)
                ->orWhere('menu_parent_id', $menu->menu_id)
                ->delete();

            Session::flash('success', 'Xóa Danh mục thành công');
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
        return Menu::select('menu_name', 'menu_id', 'menu_parent_id')
            // ->where('menu_parent_id', 0)
            ->Where('menu_active', 1)
            ->orderbyDesc('menu_id')
            ->get();
    }

    public function showParentId()
    {
        return Menu::select('menu_name', 'menu_id', 'menu_parent_id')
            ->where('menu_parent_id', 0)
            ->Where('menu_active', 1)
            ->orderbyDesc('menu_id')
            ->get();
    }

    public function getId($id)
    {
        return Menu::where('menu_id', $id)->where('menu_active', 1)->firstOrFail();
    }

    public function getBook($menu)
    {
        // books(): hasMany trong Menu Model
        return $menu->books()
            ->select('book_id', 'book_name', 'book_price_sale', 'book_thumb')
            ->where('book_active', 1)
            ->orderbyDesc('book_id')
            ->paginate(8);
    }
}