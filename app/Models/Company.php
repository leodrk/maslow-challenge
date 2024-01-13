<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function employees() {
        return $this->hasMany(Employee::class);
    }
    public function consumptionLastWeek()
    {
        $oneWeekBefore = Carbon::now()->subWeeks(1);
        return $this ->employees()
                     ->join('orders', 'orders.employee_id', 'employees.id')
                     ->where('orders.created_at', '>=', $oneWeekBefore )
                     ->sum('value');
    }
}
