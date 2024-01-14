<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'legal_name',
        'billing_address'
    ];

    public function employees() {
        return $this->hasMany(Employee::class);
    }
    public function consumptionLastWeek()
    {
        $oneWeekBefore = Carbon::now()->subWeeks(1);
        $sum = $this ->employees()
                     ->join('orders', 'orders.employee_id', 'employees.id')
                     ->where('orders.created_at', '>=', $oneWeekBefore )
                     ->sum('local_currency_cost');
        return response()->json(['result' => $sum]);
    }
}
