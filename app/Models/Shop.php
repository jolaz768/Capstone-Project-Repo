<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    protected $fillable = [
        'shop_name',
        'description',
        'phone',
        'shop_image',
        'shop_logo',
        'is_active',
        'address',
    ];
 
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function scopeForOwner($query, int $userId)
    {
        return $query->whereHas('users', fn ($query) => $query->where('users.id', $userId));
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_shops, user_id,shop_id')->withTimestamps();
    }

    public function Reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function Services()
    {
        return $this->hasMany(Service::class);
    }

    public  function Bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function  Garments()
    {
        return $this->hasMany(Garment::class);
    }

    public function shopSettings()
    {
        return $this->hasOne(ShopSetting::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function categoriesShop()
    {
        return $this->hasMany(CategoryShop::class);
    }
    public function userShops()
    {
        return $this->hasMany(UserShop::class);
    }
}
