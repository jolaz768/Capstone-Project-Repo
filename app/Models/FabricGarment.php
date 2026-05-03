<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FabricGarment extends Model
{
    //
    protected $fillable = [
        'fabric_id',
        'garment_id'
    ];

    public function garment()
    {
        return $this->belongsTo(Garment::class);
    }

    public function fabric()
    {
        return $this->belongsTo(Fabric::class);
    }
}
