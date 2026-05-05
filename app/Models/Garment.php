<?php

namespace App\Models;

use App\Traits\HasShopScope;
use Illuminate\Database\Eloquent\Model;

class Garment extends Model
{
    use HasShopScope;
    //
    protected $fillable  =[
        'shop_id',
        'category_id',
        'name',
        'description',
        'slug',
        'base_price',
        'image',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function scopeForOwner($query, int $userId)
    {
        return $query->whereHas('shop.users', fn ($query) => $query->where('users.id', $userId));
    }

    public function measurementTemplate()
    {
        return $this->hasOne(MeasurementTemplate::class);
    }

    public function garmentColorFabrics()
    {
        return $this->hasMany(GarmentColorFabric::class);
    }

    public function fabricColors()
    {
        return $this->hasManyThrough(FabricColor::class, GarmentColorFabric::class, 'garment_id', 'id', 'id', 'fabric_color_id');
    }

    public function bookingItems()
    {
        return $this->hasMany(BookingItem::class);
    }

    public function fabricGarments()
    {
        return $this->hasMany(FabricGarment::class);
    }
}
