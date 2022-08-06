<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\MainController;

// Admin login
Route::get('/admin/login', [AdminController::class, 'index']);

// Login dashboard
Route::post('/admin/login/store', [AdminController::class, 'store'])->name('login');

// Logout dashboard
Route::get('/admin/logout', [AdminController::class, 'logout']);

// Admin dashboard
Route::prefix('admin')->group(function () {

    Route::get('/main', [AdminController::class, 'main'])->name('admin');

    // Menus
    Route::prefix('menus')->group(function () {

        // Create menu
        Route::get('/add', [MenuController::class, 'create']);
        Route::post('/add', [MenuController::class, 'store']);

        // Show list
        Route::get('/all', [MenuController::class, 'index']);

        // Update menu
        // {menu} -> menu_id
        Route::get('/edit/{menu}', [MenuController::class, 'edit']);
        Route::post('/edit/{menu}', [MenuController::class, 'update']);

        // Delete menu
        Route::get('/destroy/{menu}', [MenuController::class, 'destroy']);
    });

    // Publishers
    Route::prefix('publishers')->group(function () {

        Route::get('/add', [PublisherController::class, 'create']);
        Route::post('/add', [PublisherController::class, 'store']);

        Route::get('/all', [PublisherController::class, 'index']);

        Route::get('/edit/{publisher}', [PublisherController::class, 'edit']);
        Route::post('/edit/{publisher}', [PublisherController::class, 'update']);

        Route::get('/destroy/{publisher}', [PublisherController::class, 'destroy']);
    });

    // Authors
    Route::prefix('authors')->group(function () {

        Route::get('/add', [AuthorController::class, 'create']);
        Route::post('/add', [AuthorController::class, 'store']);

        Route::get('/all', [AuthorController::class, 'index']);

        Route::get('/edit/{author}', [AuthorController::class, 'edit']);
        Route::post('/edit/{author}', [AuthorController::class, 'update']);

        Route::get('/destroy/{author}', [AuthorController::class, 'destroy']);
    });

    // News
    Route::prefix('news')->group(function () {

        Route::get('/add', [NewController::class, 'create']);
        Route::post('/add', [NewController::class, 'store']);

        Route::get('/all', [NewController::class, 'index']);

        Route::get('/edit/{new}', [NewController::class, 'edit']);
        Route::post('/edit/{new}', [NewController::class, 'update']);

        Route::get('/destroy/{new}', [NewController::class, 'destroy']);
    });

    // Books
    Route::prefix('books')->group(function () {

        Route::get('/add', [BookController::class, 'create']);
        Route::post('/add', [BookController::class, 'store']);

        Route::get('/all', [BookController::class, 'index']);

        Route::get('/edit/{book}', [BookController::class, 'edit']);
        Route::post('/edit/{book}', [BookController::class, 'update']);

        Route::get('/destroy/{book}', [BookController::class, 'destroy']);
    });

    // Upload
    Route::post('/upload/services', [UploadController::class, 'store']);

});


// User Page
// Home Page
Route::get('/', [MainController::class, 'index']);
Route::get('/trang-chu.html', [MainController::class, 'index']);


// Contact Page
Route::get('/lien-he.html', [MainController::class, 'contact']);

// About Page
Route::get('/gioi-thieu.html', [MainController::class, 'about']);



// Books
Route::get('tu-sach.html', [BookController::class, 'showAll']);
Route::post('/xem-nhanh', [BookController::class, 'quickView']);
Route::get('sach/{id}.html', [BookController::class, 'showBook']);
Route::get('/tim-kiem', [BookController::class, 'search']);


// Menus
Route::get('danh-muc/{id}.html', [MenuController::class, 'showBookByMenu']);

// Publishers
Route::get('nha-xuat-ban/{id}.html', [PublisherController::class, 'showBookByPublisher']);

// News
Route::get('tin-tuc.html', [NewController::class, 'showAll']);
Route::get('tin-tuc/{id}.html', [NewController::class, 'showNew']);

// Authors
Route::get('tac-gia.html', [AuthorController::class, 'showAll']);
Route::get('tac-gia/{id}.html', [AuthorController::class, 'showAuthor']);


