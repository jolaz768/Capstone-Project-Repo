<?php

namespace App\Models;

use App\Traits\HasShopScope;
use Illuminate\Database\Eloquent\Model;

class ShopSetting extends Model
{
    use HasShopScope;
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
