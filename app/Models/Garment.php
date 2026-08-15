<?php

namespace App\Models;

use App\Traits\HasShopScope;
use Illuminate\Database\Eloquent\Model;

class Garment extends Model
{
    use HasShopScope;
    //
    protected $fillable  = [
        'shop_id',
        'name',
        'description',
        'service_id',
        'category_id',
        'slug',
        'base_price',
        'image',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function measurementTemplate()
    {
        return $this->hasOne(MeasurementTemplate::class);
    }


    public function bookingItems()
    {
        return $this->hasMany(BookingItem::class);
    }

    public function category()
    {
        return $this->belongsTo(CategoryShop::class, 'category_id');
    }
}
