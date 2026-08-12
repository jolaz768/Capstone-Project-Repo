<?php

namespace App\Models;

use App\Traits\HasShopScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Service extends Model
{
    use HasShopScope;

    protected $fillable = [
        'name',
        'shop_id',
        'image',
        'description',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
