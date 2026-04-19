<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $filable = [
        'cat_name',
        'cat_slug',
        'cat_desc',
        'tenant_id',
    ];

    public function garments()
    {
        return $this->hasMany(Garment::class);
    }
}
