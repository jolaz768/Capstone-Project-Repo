<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    //
    protected $fillable = [
        'payment_name',
        'payment_code',
        'payment_description',
    ];
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
