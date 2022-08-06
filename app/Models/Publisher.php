<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $primaryKey = 'publisher_id';

    protected $fillable = [
        'publisher_name',
        'publisher_description',
        'publisher_active'
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'publisher_id', 'publisher_id');
    }
}
