<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FabricColor extends Model
{
    //
    protected $fillable = [
        'fabric_id',
        'color_id',

    ];
    public function fabric()
    {
        return $this->belongsTo(Fabric::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
