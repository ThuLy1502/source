<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\CreateFormRequest;
use App\Http\Services\Admin\AdminService;
use App\Models\Admin;

use App\Http\Services\Menus\MenuService;
use App\Http\Services\Publishers\PublisherService;
use App\Http\Services\Authors\AuthorService;
use App\Http\Services\Books\BookService;
use App\Http\Services\News\NewService;

use Session;

class AdminController extends Controller
{
    protected $adminService;

    protected $menuService;
    protected $publisherService;
    protected $authorService;
    protected $bookService;
    protected $newService;

    public function __construct(AdminService $adminService, MenuService $menuService, PublisherService $publisherService, 
                                AuthorService $authorService, BookService $bookService, NewService $newService)
    {
        $this->adminService = $adminService;

        $this->menuService = $menuService;
        $this->publisherService = $publisherService;
        $this->authorService = $authorService;
        $this->bookService = $bookService;
        $this->newService = $newService;
    }

    public function index()
    {
        return view('admin.login', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    // Hàm xác thực đã đăng nhập
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

    public function main()
    {
        $this->auth();
        return view('admin.home', [
            'menus' => $this->menuService->count(),
            'publishers' => $this->publisherService->count(),
            'authors' => $this->authorService->count(),
            'books' => $this->bookService->count(),
            'news' => $this->newService->count(),
            'title' => "Trang Admin"
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $result = $this->adminService->login($request);

        return redirect()->route('admin');
    }

    public function logout(Request $request)
    {
        $this->auth();
        $result = $this->adminService->logout($request);
        
        return redirect('admin/login');
    }
}
