<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopSetting extends Model
{
    //
    protected  $fillable = [
        'shop_id',
        'auto_accept_booking',
        'open_time',
        'closing_time',
        'working_days',
        'tenant_id',
    ];

    public function shop()
    {
        return $this->hasOne(Shop::class);
    }
}
