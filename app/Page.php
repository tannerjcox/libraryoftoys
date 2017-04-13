<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'url', 'page_content'];
    public static function findByUrl($url)
    {
        return static::whereUrl($url)->first();
    }
}
