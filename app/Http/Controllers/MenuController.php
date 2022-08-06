<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Menus\CreateFormRequest;
use App\Http\Services\Menus\MenuService;
use App\Http\Services\Publishers\PublisherService;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;

use Session;

class MenuController extends Controller
{
    protected $menuService;
    protected $publisherService;

    public function __construct(MenuService $menuService, PublisherService $publisherService)
    {
        $this->menuService = $menuService;
        $this->publisherService = $publisherService;
    }

    public function auth()
    {
        // Nếu đã đăng nhập thì sẽ sinh ra một admin_id
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return redirect('admin/main');
        } else {
            return redirect('admin/login')->send();
        }
    }


    public function create()
    {
        $this->auth();
        return view('admin.menus.add', [
            'title' => 'Thêm Danh Mục Mới',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->auth();
        $result = $this->menuService->create($request);

        return redirect()->back();
    }

    public function index()
    {
        $this->auth();
        return view('admin.menus.all', [
            'title' => 'Danh Sách Danh Mục Mới Nhất',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function destroy(Menu $menu)
    {
        $this->auth();
        $books = $this->menuService->getBook($menu);
        $menus = $this->menuService->getChildren($menu);

        // dd($menus)

        if (count($books) == 0) {
            $result = $this->menuService->destroy($menu);
            // Session::flash('error', 'Danh mục không có!');
        } 
        // else if (count($menus) != 0) {
        //     Session::flash('error', 'Danh mục đã có danh mục con. Không xóa được!');
        // } 
        else {
            Session::flash('error', 'Danh mục đã có sách. Không xóa được!');
        }

        return redirect('/admin/menus/all');
    }

    public function edit(Menu $menu)
    {
        $this->auth();
        return view('admin.menus.edit', [
            'title' => 'Chỉnh Sửa Danh Mục: ' . $menu->menu_name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request)
    {
        $this->auth();
        $this->menuService->update($request, $menu);

        return redirect('/admin/menus/all');
    }


    // User Page
    // Trang hiển thị sách theo danh mục
    public function showBookByMenu($id) {
        $menu = $this->menuService->getId($id);
        $books = $this->menuService->getBook($menu);

        return view('user.menus.all', [
            'title' => $menu->menu_name,
            'menus' => $this->menuService->show(),
            'publishers' => $this->publisherService->show(),
            'books' => $books
        ]);
    }
}
