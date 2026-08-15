<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasShopScope;

class Booking extends Model
{
    use HasShopScope;
    protected $fillable = [
        'user_id',
        'shop_id',
        'service_id',
        'customer_id',
        'status',
        'booking_date',
        'require_date',
        'total_amount',
        'final_amount',
        'payment_method',
        'status',
        'serve_by',
        'tax'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
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
