<?php

namespace App;

class Review extends BaseModel
{
    protected $fillable = [
        'title', 'description', 'user_id', 'rating'
    ];

    public function reviewable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function renderRating()
    {
        $stars = '';
        for ($i = 0; $i < 5; $i++) {
            $stars .= '<i class="fa fa-star' . ($this->rating > $i ? " gold-star " : "-o") .  '"></i>';
        }
        return $stars;
    }
}
