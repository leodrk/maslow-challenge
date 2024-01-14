<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function getEmployeeByFirstName($name)
    {
        return $this->employees()->where('employees.first_name', '=', $name)->firstOrFail();
    }

    public function getEmployeeByLastName($lastName)
    {
        return $this->employees()->where('employees.last_name', '=', $lastName)->firstOrFail();
    }

    public static function billingByCompany(){
        return Company::query()->leftJoin('employees', 'companies.id', '=', 'employees.company_id')
                               ->select('companies.id as company_id',
                                                'companies.legal_name AS company_name',
                                                DB::raw('COUNT(employees.id) AS employees_quantity'),
                                                DB::raw('COUNT(employees.id) * 5 AS billing_total'))
                               ->groupBy('companies.id', 'companies.legal_name')
                               ->paginate(10);
    }
}
