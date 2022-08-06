<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class Book_Author extends Model
{
    use HasFactory;

    protected $table = 'book_authors';

    protected $primaryKey = ['book_id', 'author_id'];

    protected $fillable = [
        'book_id',
        'author_id'
    ];

    public function book_author()
    {
        return $this->hasOne(Book::class, 'book_id', 'book_id')
            ->withDefault(['book_name' => '']);
    }

    public function author_book()
    {
        return $this->hasOne(Author::class, 'author_id', 'author_id')
            ->withDefault(['author_name' => '']);
    }
}