<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    //
    protected $fillable = [
        'name',
        'image',
        'description',
    ];

    public function fabricColors()
    {
        return $this->hasMany(FabricColor::class);
    }
}
