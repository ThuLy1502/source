<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $primaryKey = 'menu_id';
    
    protected $fillable = [
        'menu_name',
        'menu_parent_id',
        'menu_description',
        'menu_active'
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'menu_id', 'menu_id');
    }
}
