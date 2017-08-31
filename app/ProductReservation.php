<?php

namespace App;

class ProductReservation extends BaseModel
{
    protected $fillable = [
        'starts_at', 'ends_at', 'product_id', 'product_rate_id', 'user_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
