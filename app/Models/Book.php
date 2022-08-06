<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'book_id';

    protected $fillable = [
        'book_name',
        'book_description',

        'book_format',
        'book_pages',
        'book_weight',
        'book_publishing_year',

        'book_price',
        'book_price_sale',

        'menu_id',
        'publisher_id',
        'author_id',

        'book_thumb',
        'book_active'
    ];

    // Tạo relationship để lấy các thuộc tính của table quan hệ với book
    public function menu()
    {
        // return $this->hasOne(User::class, 'id', 'menu_id');
        return $this->hasOne(Menu::class, 'menu_id', 'menu_id')
            ->withDefault(['menu_name' => '']);
    }

    public function publisher()
    {
        return $this->hasOne(Publisher::class, 'publisher_id', 'publisher_id')
            ->withDefault(['publisher_name' => '']);
    }

    public function book_authors()
    {
        return $this->hasMany(Book_Author::class, 'book_id', 'book_id');
    }
}
