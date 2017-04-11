<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'url'];
    public static function findByUrl($url)
    {
        return static::whereUrl($url)->first();
    }
}
