<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    //
    protected $fillable = [
        'name',
        'measurement',
    ];
    public function garmentSizes()
    {
        return $this->hasMany(GarmentSize::class);
    }
}
