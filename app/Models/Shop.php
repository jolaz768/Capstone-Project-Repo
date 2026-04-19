<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    protected  $fillable = [
        'user_id',
        'tenant_id',
        'name',
        'description',
        'slug',
        'phone',
        'shop_image',
        'shop_logo',
        'is_active',
        'address',
        'shop_setting_id'
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function shopServices()
    {
        return $this->hasMany(ShopService::class);
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
}
