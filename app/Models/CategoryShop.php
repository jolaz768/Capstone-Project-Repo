<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryShop extends Model
{
    //
    protected $fillable = [
        'shop_id',
        'cat_name',
        'cat_slug',
        'cat_desc',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
