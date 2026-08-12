<?php

namespace App\Models;

use App\Traits\HasShopScope;
use Illuminate\Database\Eloquent\Model;

class UserShop extends Model
{
    use HasShopScope;
    //
    protected $fillable = [
        'user_id',
        'shop_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
