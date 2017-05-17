<?php

namespace App;

class ProductRate extends BaseModel
{
    protected $fillable = [
        'product_id', 'rate', 'unit'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function productReservation()
    {
        return $this->belongsTo('App\ProductReservation');
    }
}
