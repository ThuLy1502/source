<?php
namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{
    public static function active($active = 0): string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs"> Không </span>'
            : '<span class="btn btn-success btn-xs"> Có </span>';
    }

    public static function isChild($menus, $id) : bool
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }

        return false;
    }

    public static function price($price = 0, $priceSale = 0)
    {
        if ($priceSale != 0) return number_format($priceSale);
        if ($price != 0)  return number_format($price);
    }
}