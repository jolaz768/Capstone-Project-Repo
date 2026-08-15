<?php

namespace App\Models;

use App\Traits\HasShopScope;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    //
    use HasShopScope;
    protected $fillable = [
        'shop_id',
        'service_id',
    ];
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
