<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasShopScope;

class ShopRole extends Model
{
    //
    use HasShopScope;

    protected $fillable = [
        'shop_id',
        'role_name',
        'position',
    ];
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
