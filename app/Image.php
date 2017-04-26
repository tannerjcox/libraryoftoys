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
    CONST THUMBNAIL_HEIGHT = 250;

    public function __construct($fileName = null)
    {
        $this->filename = $fileName;
    }

    public function imageable()
    {
        return $this->morphTo();
    }

    public function scopeThumbnails($query)
    {
        return $query->where('path', 'LIKE', '%thumbs%');
    }

    public function getThumbnailUrlAttribute()
    {
        return $this->path . 'thumbs/' . $this->name;
    }

    public function getUrlAttribute()
    {
        return $this->path . $this->name;
    }
}
