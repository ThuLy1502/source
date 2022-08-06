<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Publishers\CreateFormRequest;
use App\Http\Services\Publishers\PublisherService;
use App\Models\Publisher;
use App\Http\Services\Menus\MenuService;

use Session;

class PublisherController extends Controller
{
    protected $publisherService;
    protected $menuService;

    public function __construct(publisherService $publisherService, MenuService $menuService)
    {
        $this->publisherService = $publisherService;
        $this->menuService = $menuService;
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
        return view('admin.publishers.add', [
            'title' => 'Thêm Nhà Xuất Bản Mới'
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->auth();
        $result = $this->publisherService->create($request);

        return redirect()->back();
    }

    public function index()
    {
        $this->auth();
        return view('admin.publishers.all', [
            'title' => 'Danh Sách NXB Mới Nhất',
            'publishers' => $this->publisherService->getAll()
        ]);
    }

    public function destroy(Publisher $publisher)
    {
        $this->auth();
        $books = $this->publisherService->getBook($publisher);

        if (count($books) == 0) {
            $result = $this->publisherService->destroy($publisher);
            // Session::flash('error', 'NXB không có!');
        } else {
            Session::flash('error', 'Nhà xuất bản đã có sách. Không xóa được!');
        }

        return redirect('/admin/publishers/all');
    }

    public function edit(Publisher $publisher)
    {
        $this->auth();
        return view('admin.publishers.edit', [
            'title' => 'Chỉnh Sửa NXB: ' . $publisher->name,
            'publisher' => $publisher
        ]);
    }

    public function update(Publisher $publisher, CreateFormRequest $request)
    {
        $this->auth();
        $this->publisherService->update($request, $publisher);

        return redirect('/admin/publishers/all');
    }

    // User
    // Trang hiển thị sách theo NXB
    public function showBookByPublisher($id) {
        $publisher = $this->publisherService->getId($id);
        $books = $this->publisherService->getBook($publisher);

        return view('user.publishers.all', [
            'title' => $publisher->publisher_name,
            'menus' => $this->menuService->show(),
            'publishers' => $this->publisherService->show(),
            'books' => $books
        ]);
    }
}