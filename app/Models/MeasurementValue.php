<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasurementValue extends Model
{
    //
    protected $fillalbe =  [
        'measurement_field_id',
        'value'
    ];

    public function measurementField()
    {
        return $this->hasMany(MeasurementField::class);
    }
}
