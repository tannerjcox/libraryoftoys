<?php

namespace App;

class Page extends BaseModel
{
    protected $fillable = ['title', 'url', 'page_content'];
    public static function findByUrl($url)
    {
        return static::whereUrl($url)->first();
    }
}
