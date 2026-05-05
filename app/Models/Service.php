<?php

namespace App\Models;

use App\Traits\HasShopScope;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasShopScope;

    protected $fillable = [
        'name',
        'shop_id',
        'slug',
        'description',
    ];

    public function scopeForOwner($query, int $userId)
    {
        return $query->whereHas('shop.users', fn ($query) => $query->where('users.id', $userId));
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
