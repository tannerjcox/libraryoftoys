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
        return str_slug($this->name);
    }
}
