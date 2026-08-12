<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Traits\HasShopScope;

class Size extends Model
{
    //
    use HasShopScope;
        protected $fillable = [
        'name',
        'measurement',
        'shop_id',
    ];
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    public function garmentSizes()
    {
        return $this->hasMany(GarmentSize::class);
    }
}
