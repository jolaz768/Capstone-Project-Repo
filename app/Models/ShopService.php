<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopService extends Model
{
    //
    protected $fillable = [
        'shop_id',
        'service_id',
        'tenant_id', 
    ];
    public function service()
    {
        return $this->belongsTo(Services::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
