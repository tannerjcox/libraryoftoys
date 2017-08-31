<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
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
    CONST THUMBNAIL_HEIGHT = 300;
    CONST MEDIUM_HEIGHT = 750;

    public function __construct($fileName = null)
    {
        $this->filename = $fileName;
    }

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getThumbnailUrlAttribute()
    {
        return $this->path . 'thumbs/' . $this->name;
    }

    public function getMediumUrlAttribute()
    {
        return $this->path . 'medium/' . $this->name;
    }

    public function getUrlAttribute()
    {
        return $this->path . $this->name;
    }
}
