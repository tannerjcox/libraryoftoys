<?php

namespace App;

class Product extends BaseModel
{
    CONST SMALL_THUMBNAIL_HEIGHT = 75;
    protected $fillable = [
        'name', 'description', 'status', 'is_enabled', 'is_approved', 'price', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable')->orderBy('order', 'asc');
    }

    public function reviews()
    {
        return $this->morphMany('App\Review', 'reviewable');
    }

    public function getSupplierNameAttribute()
    {
        return $this->user->firstName;
    }

    public function getRatingAttribute()
    {
        return round($this->reviews()->get()->avg('rating'), 2);
    }

    public function getRenderRatingAttribute()
    {
        $stars = '<span data-toggle="tooltip" title="' . $this->rating . '">';
        for ($i = 1; $i <= 5; $i++) {
            $stars .= '<i class="fa gold-star fa-star' . ($this->rating >= $i ? "" : ($this->rating + 1 - $i > 0.25 ? "-half-empty" : "-o")) . '"></i>';
        }
        $stars .= '</span>';
        return $stars;
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
        if (!$this->images()->count()) {
            return '';
        }
        return "<img src={$this->images()->first()->thumbnailUrl}>";
    }

    public function getRenderedPriceAttribute()
    {
        return $this->price;
    }

    public function getSmallThumbnailAttribute()
    {
        $dimension = static::SMALL_THUMBNAIL_HEIGHT;
        if (!$this->images()->count()) {
            return '';
        }
        return "<img src={$this->images()->first()->thumbnailUrl} height='{$dimension}'>";
    }

    public function getPreviewLinkAttribute()
    {
        return "<a href='/{$this->url}?preview=1' target='_blank'>View</a>";
    }
}
