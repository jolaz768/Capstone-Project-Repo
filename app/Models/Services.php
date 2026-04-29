<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    //
    protected $fillable = [
      'name',
      'shop_id',
      'slug',
      'description',  
    ];
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

}
