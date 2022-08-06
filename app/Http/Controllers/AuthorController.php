<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Authors\CreateFormRequest;
use App\Http\Requests\Authors\UpdateFormRequest;

use App\Http\Services\Authors\AuthorService;
use App\Models\Author;

use App\Http\Services\Menus\MenuService;
use App\Http\Services\Publishers\PublisherService;


use Session;

class AuthorController extends Controller
{
    protected $authorService;
    protected $publisherService;
    protected $menuService;

    public function __construct(AuthorService $authorService, MenuService $menuService, PublisherService $publisherService)
    {
        $this->authorService = $authorService;
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

    public function index()
    {
        $this->auth();
        return view('admin.authors.all', [
            'title' => 'Danh sách Tác giả',
            'authors' => $this->authorService->getAll()
        ]);
    }

    public function create()
    {
        $this->auth();
        return view('admin.authors.add', [
            'title' => 'Thêm Tác Giả Mới'
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->auth();
        $result = $this->authorService->insert($request);

        return redirect()->back();
    }

    public function edit(Author $author)
    {
        $this->auth();
        return view('admin.authors.edit', [
            'title' => 'Cập nhật Tác giả',
            'authors' => $author
        ]);
    }

    public function update(UpdateFormRequest $request, Author $author)
    {
        $this->auth();
        $this->authorService->update($request, $author);

        return redirect('/admin/authors/all');
    }

    public function destroy(Author $author)
    {
        $this->auth();
        $books = $this->authorService->getBook($author);

        if (count($books) == 0) {
            $result = $this->authorService->destroy($author);
            // Session::flash('error', 'NXB không có!');
        } else {
            Session::flash('error', 'Tác giả đã có sách. Không xóa được!');
        }

        return redirect('/admin/authors/all');
    }

    
    // User Page
    // Trang hiển thị tất cả tác giả
    public function showAll()
    {
        return view('user.authors.all', [
            'title' => 'Tác Giả',
            'menus' => $this->menuService->show(),
            'publishers' => $this->publisherService->show(),
            'authors' => $this->authorService->getAll(),
        ]);
    }

    // Trang chi tiết tác giả
    public function showAuthor($id) {
        $author = $this->authorService->getId($id);
        $books = $this->authorService->getBook($id);

        return view('user.authors.content', [
            'title' => $author->author_name,
            'menus' => $this->menuService->show(),
            'publishers' => $this->publisherService->show(),
            'books' => $books,
            'author' => $author
        ]);
    }
}
