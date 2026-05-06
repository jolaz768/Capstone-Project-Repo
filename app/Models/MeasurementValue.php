<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasurementValue extends Model
{
    protected $fillable = [
        'measurement_field_id',
        'value',
    ];

    public function measurementField()
    {
        return $this->belongsTo(MeasurementField::class, 'measurement_field_id');
    }
}
