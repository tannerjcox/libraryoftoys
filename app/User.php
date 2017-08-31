<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Venturecraft\Revisionable\RevisionableTrait;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable, RevisionableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be considered dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function productReservations()
    {
        return $this->hasMany('App\ProductReservation');
    }

    public function rentedProducts()
    {
        return Product::whereIn('id', $this->productReservations()->pluck('product_id'));
    }

    public function reviewed()
    {
        return $this->morphMany('App\Review', 'reviewable');
    }

    public function getRatingAttribute()
    {
        return $this->reviews()->get()->avg('rating');
    }

    public function getRenderRatingAttribute()
    {
        $stars = '';
        for ($i = 1; $i <= 5; $i++) {
            $stars .= '<i class="fa fa-star' . ($this->rating >= $i ? " gold-star " : "-o") . '"></i>';
        }
        return $stars;
    }

    public function reservations()
    {
        return $this->hasMany('App\ProductReservation');
    }

    public function verifiedInteraction($object)
    {
        if ($object->email) {
            return $this->hasRentedFrom($object);
        }

        return $this->hasRented($object);
    }

    public function hasRentedFrom(User $user)
    {
        return $this->reservations()->where('user_id', $user->id)->first();
    }

    public function hasRented(Product $product)
    {
        return $this->rentedProducts()->where('products.id', $product->id)->first();
    }

    public function hasReviewedProduct($id)
    {
        return $this->reviews()->where('reviewable_id', $id)->where('reviewable_type', 'App\Product')->count();
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function scopeAdmins($query)
    {
        return $query->whereIsAdmin(true);
    }

    public function getFirstNameAttribute()
    {
        return explode(' ', $this->name)[0];
    }
}
