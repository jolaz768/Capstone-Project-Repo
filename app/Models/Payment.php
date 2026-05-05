<?php

namespace App\Models;

use App\Traits\HasShopScope;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasShopScope;
    //
    protected $fillable = [
        'shop_id',
        'booking_id',
        'user_id',
        'amount',
        'payment_method_id',
        'status',
        'reference',
        'paid_at'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}

