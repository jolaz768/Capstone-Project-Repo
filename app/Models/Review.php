<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable =[
    'shop_id',
    'booking_id',
    'tenant_id',
    'user_id',
    'rating',
    'comment',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
