<?php

namespace App\Models;

use App\Traits\HasShopScope;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // use HasShopScope;
    //
    protected $fillable = [
        'cat_name',
        'cat_slug',
        'cat_desc',
        'shop_id',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
