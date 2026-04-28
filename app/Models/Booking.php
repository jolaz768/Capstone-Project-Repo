<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'tenant_id',
        'shop_id',
        'status',
        'booking_date',
        'booking_type',
        'total_price',
    ];

    protected static function booted(): void
    {
        static::creating(function (Booking $booking) {
            if (! empty($booking->tenant_id)) {
                return;
            }

            if (empty($booking->shop_id)) {
                return;
            }

            $shop = Shop::query()
                ->select(['id', 'tenant_id', 'user_id'])
                ->find($booking->shop_id);

            if (! $shop) {
                return;
            }

            $booking->tenant_id = $shop->tenant_id ?? $shop->user_id;
        });
    }
    
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
