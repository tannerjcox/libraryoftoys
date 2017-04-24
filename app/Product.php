<?php

namespace App;

class Product extends BaseModel
{
    protected $fillable = [
        'name', 'description', 'status', 'is_enabled', 'price', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function isAvailable()
    {
        return $this->is_enabled;
    }

    public function scopeAvailable($query)
    {
        return $query->whereIsEnabled(true);
    }

    public function getUrlAttribute()
    {
        return str_slug($this->name . ' ' . $this->id);
    }

    public function getFullUrlAttribute()
    {
        return env('APP_URL') . str_slug($this->name . ' ' . $this->id);
    }

    public function getMainThumbnailAttribute()
    {
        $dimension = Image::THUMBNAIL_SQUARE;
        if(!$this->images()->count()) {
            return '';
        }
        return "<img src={$this->images()->first()->url} width='{$dimension}'>";
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable')->orderBy('order', 'asc');
    }

    public function getPreviewLinkAttribute()
    {
        return "<a href=''/{$this->url}?preview=1' target='_blank'>View</a>";
    }
}
