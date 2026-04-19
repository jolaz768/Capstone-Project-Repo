<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasurementField extends Model
{
    //
    protected $fillable = [
        'measurement_template_id',
        'field_name',
        'unit',
    ];

    public function measurementTemplate()
    {
        return $this->belongsTo(MeasurementTemplate::class);
    }

    public function measurementValues()
    {
        return $this->hasOne(MeasurementValue::class);
    }
}
