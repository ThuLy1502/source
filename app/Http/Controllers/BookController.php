<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Books\CreateFormRequest;
use App\Http\Requests\Books\UpdateFormRequest;
use App\Http\Services\Books\BookService;
use App\Models\Book;

use App\Http\Services\Menus\MenuService;
use App\Http\Services\Publishers\PublisherService;
use App\Http\Services\Authors\AuthorService;

use Session;

class BookController extends Controller
{
    protected $bookService;
    protected $publisherService;
    protected $menuService;
    protected $authorService;

    public function __construct(BookService $bookService, MenuService $menuService, PublisherService $publisherService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->menuService = $menuService;
        $this->publisherService = $publisherService;
        $this->authorService = $authorService;
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
        return view('admin.books.all', [
            'title' => 'Danh sách Sách',
            'authors' => $this->bookService->getBook_Authors(),
            'books' => $this->bookService->get()
        ]);
    }

    public function create()
    {
        $this->auth();
        return view('admin.books.add', [
            'title' => 'Thêm Sách Mới',
            'menus' => $this->bookService->getMenu(),
            'publishers' => $this->bookService->getPublisher(),
            'authors' => $this->bookService->getAuthor()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->auth();
        $result = $this->bookService->insert($request);

        return redirect()->back();
    }

    public function edit(Book $book)
    {
        $this->auth();
        return view('admin.books.edit', [
            'title' => 'Cập nhật Sách',
            'menus' => $this->bookService->getMenu(),
            'publishers' => $this->bookService->getPublisher(),
            'authors' => $this->bookService->getBook_Authors(),
            'books' => $book
        ]);
    }

    public function update(UpdateFormRequest $request, Book $book)
    {
        $this->auth();
        $result = $this->bookService->update($request, $book);
        if ($result) {
            return redirect('/admin/books/all');
        }

        return redirect()->back();
    }

    public function destroy(Book $book)
    {
        $this->auth();
        $result = $this->bookService->destroy($book);

        return redirect('/admin/books/all');
    }


    // User Page
    // Trang hiển thị tất cả sách
    public function showAll()
    {
        return view('user.books.all', [
            'title' => 'Tủ Sách',
            'menus' => $this->menuService->show(),
            'publishers' => $this->publisherService->show(),
            'books' => $this->bookService->get12(),
        ]);
    }

    // Xem sách nhanh bằng modal
    public function quickView(Request $request)
    {
        $result = $this->bookService->quickView($request);

        echo json_encode($result);
    }

    // Trang chi tiết sách
    public function showBook($id) {
        $book = $this->bookService->show($id);
        $menu_id = $book->menu_id;
        $authors_of_book = $this->bookService->getBookById($id);
        $books = $this->bookService->showBookRelated($id, $menu_id);

        return view('user.books.content', [
            'title' => $book->book_name,
            'menus' => $this->menuService->show(),
            'publishers' => $this->publisherService->show(),
            'books' => $books,
            'authors' => $authors_of_book,
            'book' => $book
        ]);
    }

    // Tìm kiếm
    public function search(Request $request) {
        $keyword = $request->keyword;
        $books = $this->bookService->search($keyword);

        return view('user.books.search', [
            'title' => ' Book Website',
            'menus' => $this->menuService->show(),
            'publishers' => $this->publisherService->show(),
            'keyword' => $keyword,
            'books' => $books
        ]);
    }

    // public function autocompleteAjax(Request $request) {
    //     $data = $request->all();

    //     if ($data['query']) {
    //         $books = Book::where('book_active', 1)
    //             ->where('book_name', 'LIKE', '%' . $data['query'] . '%')
    //             ->get();
    //         $out_put = '<ul class="drop-down-menu" style="display:block; position:relative">';
    //         foreach($books as $book) {
    //             $out_put .='
    //             <li class="li_search_ajax"><a href="#">' . $book->book_name . '</a></li>
    //             ';
    //         }
    //         $out_put .= '</ul>';
    //         echo $out_put;
    //     }
    // }
}