<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasurementField extends Model
{
    //
    protected $fillable = [
        'measurementt_template_id',
        'field_name',
        'unit',
    ];

    public function measurementTemplate()
    {
        return $this->belongsTo(MeasurementTemplate::class, 'measurement_template_id');
    }

    public function measurementValue()
    {
        return $this->hasOne(MeasurementValue::class, 'measurement_field_id');
    }
}
