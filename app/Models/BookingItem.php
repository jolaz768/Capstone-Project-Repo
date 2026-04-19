<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingItem extends Model
{
    //
    protected  $fillable = [
        'booking_id',
        'garment_id',
        'quantity',
        'Sub_total'
    ];

    public  function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    
    public function garment()
    {
        return $this->belongsTo(Garment::class);
    }
}
