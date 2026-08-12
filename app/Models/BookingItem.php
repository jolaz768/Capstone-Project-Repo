<?php

namespace App\Models;

use App\Traits\HasShopScope;
use Illuminate\Database\Eloquent\Model;

class BookingItem extends Model
{
    //
    use HasShopScope;
    protected  $fillable = [
        'booking_id',
        'garment_id',
        'quantity',
        'sub_total',
    ];

    public  function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    
    public function garment()
    {
        return $this->belongsTo(Garment::class);
    }
    public function customerMeasurements()
    {
        return $this->hasMany(CustomerMesurement::class);
    }

    
}
