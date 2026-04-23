<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerMesurement extends Model
{
    //
    protected $fillable = [
    'user_id',
    'garment_id',
    'measurement_template_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function garment()
    {
        return $this->belongsTo(Garment::class);
    }

    public function measurementTemplate()
    {
        return $this->belongsTo(MeasurementTemplate::class);
    }

}
