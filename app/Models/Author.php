<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $primaryKey = 'author_id';

    protected $fillable = [
        'author_name',
        'author_thumb',
        'author_description',
        'author_active'
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'author_id', 'author_id');
    }

    public function author_books()
    {
        return $this->hasMany(Book_Author::class, 'author_id', 'author_id');
    }
}
