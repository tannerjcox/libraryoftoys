<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public static function findByUrl($url)
    {
        return static::whereUrl($url)->first();
    }
}
