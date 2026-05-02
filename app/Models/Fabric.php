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
        'price',
    ];

    public function fabricColors()
    {
        return $this->hasMany(FabricColor::class);
    }
    public function colors()
{
    return $this->belongsToMany(Color::class, 'fabric_colors', 'fabric_id', 'color_id');
}
   
}
