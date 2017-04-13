<?php

namespace App;

class Product extends BaseModel
{
    protected $fillable = [
        'name', 'description', 'status', 'is_enabled', 'price'
    ];

    public function isAvailable()
    {
        return $this->is_enabled;
    }

    public function scopeAvailable($query)
    {
        return $query->whereIsEnabled(true);
    }
}
