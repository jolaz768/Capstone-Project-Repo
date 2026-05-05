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
    ];

    public function shop()
    {
        return $this->hasOne(Shop::class);
    }
}
