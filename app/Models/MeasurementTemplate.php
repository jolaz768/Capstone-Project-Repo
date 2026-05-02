<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasurementTemplate extends Model
{
    //
    protected $fillable = [
        'garment_id',
        'name',
    ];
}

public function garment()
{
    return $this->belongsTo(Garment::class);
}