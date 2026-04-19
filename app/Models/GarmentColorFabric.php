<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GarmentColorFabric extends Model
{
    //
    protected $fillable = [
        'garment_id',
        'fabric_color_id',   
    ];

    public function garment()
    {
        return $this->belongsTo(Garment::class);
    }

    public function fabricColor()
    {
        return $this->belongsTo(FabricColor::class);
    }
}
