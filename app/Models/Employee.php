<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasShopScope;

class Employee extends Model
{
    //
    use HasShopScope;

    protected $fillable = [
        'user_id',
        'shop_id',
        'name',
        'position',
        'commission_rate',
        'phone',
        'hired_at',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function employeeServices()
    {
        return $this->hasMany(EmployeeService::class);
    }
}
