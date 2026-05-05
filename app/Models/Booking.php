<?php

namespace App\Models;

use App\Traits\HasShopScope;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // use HasShopScope;
    protected $fillable = [
        'user_id',
        'shop_id',
        'status',
        'booking_date',
        'total_price',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }



    public function bookingItems()
    {
        return $this->hasMany(BookingItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
