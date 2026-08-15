<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasShopScope;

class EmployeeService extends Model
{
    //
    use HasShopScope;
    protected $fillable = [
        'employee_id',
        'service_id',
        'shop_id',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
