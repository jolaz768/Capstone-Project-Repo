<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GarmentSize extends Model
{
    //
    protected $fillable = [
        'garment_id',
        'size_id',
    ];
    public function garment()
    {
        return $this->belongsTo(Garment::class);
    }
    public function size()
    {
        return $this->belongsTo(MeasurementTemplate::class,'size_id');
    }
}
