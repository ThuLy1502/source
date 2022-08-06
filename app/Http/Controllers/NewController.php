<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\News\CreateFormRequest;
use App\Http\Requests\News\UpdateFormRequest;
use App\Http\Services\News\NewService;
use App\Models\News;

use App\Http\Services\Menus\MenuService;
use App\Http\Services\Publishers\PublisherService;

use Session;

class NewController extends Controller
{
    protected $newService;
    protected $publisherService;
    protected $menuService;

    public function __construct(NewService $newService, MenuService $menuService, PublisherService $publisherService)
    {
        $this->newService = $newService;
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
        return view('admin.news.all', [
            'title' => 'Danh sách Tin tức',
            'news' => $this->newService->getAll()
        ]);
    }

    public function create()
    {
        $this->auth();
        return view('admin.news.add', [
            'title' => 'Thêm Tin Tức Mới'
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->auth();
        $result = $this->newService->insert($request);

        return redirect()->back();
    }

    public function edit(News $new)
    {
        $this->auth();
        return view('admin.news.edit', [
            'title' => 'Cập nhật Tin tức',
            'news' => $new
        ]);
    }

    public function update(UpdateFormRequest $request, News $new)
    {
        $this->auth();
        $this->newService->update($request, $new);

        return redirect('/admin/news/all');
    }

    public function destroy(News $new)
    {
        $this->auth();
        $result = $this->newService->destroy($new);

        return redirect('/admin/news/all');
    }


    // User Page
    public function showAll()
    {
        return view('user.news.all', [
            'title' => 'Tin Tức',
            'menus' => $this->menuService->show(),
            'publishers' => $this->publisherService->show(),
            'news' => $this->newService->get(),
        ]);
    }

    public function showNew($id) {
        $news = $this->newService->showById($id);
        $new = $this->newService->getId($id);

        return view('user.news.content', [
            'title' => $new->new_title,
            'menus' => $this->menuService->show(),
            'publishers' => $this->publisherService->show(),
            'news' => $news,
            'new' => $new
        ]);
    }
}
