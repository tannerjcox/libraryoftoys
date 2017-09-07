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
        $stars = '<span data-toggle="tooltip" data-tooltip="' . $this->rating . ' of 5" class="rating">';
        for ($i = 1; $i <= 5; $i++) {
            $stars .= '<span class="fa fa-stack">';
            if ($this->rating >= $i) {
                $stars .= '<i class="fa gold-star fa-star fa-stack-2x"></i>';
            }
            $stars .= '<i class="fa gold-star fa-star-o fa-stack-2x"></i>';
            $stars .= '</span>';
        }
        $stars .= '</span>';
        return $stars;
    }
}
