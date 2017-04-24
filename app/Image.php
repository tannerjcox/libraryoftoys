<?php

namespace App;

class Image extends BaseModel
{
    /**
     * The attributes that should be considered dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];
    protected $filename;
    CONST THUMBNAIL_SQUARE = 300;

    public function __construct($fileName = null)
    {
        $this->filename = $fileName;
    }

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute()
    {
        return $this->path;
    }
}
