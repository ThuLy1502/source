<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $primaryKey = 'new_id';

    protected $fillable = [
        'new_title',
        'new_thumb',
        'new_description',
        'new_content',
        'new_active'
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'new_id', 'new_id');
    }
}
