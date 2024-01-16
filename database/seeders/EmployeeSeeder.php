<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run()
    {

        for ($i = 1; $i <= 3; $i++) {
            Employee::create([
                'id' => $i,
                'first_name' => 'Nombre' . $i,
                'last_name' => 'Apellido' . $i,
                'date_of_birth' => '1990-01-01',
                'company_id' => 1,
                'user_id' => $i,
            ]);
        }


        Employee::create([
            'id' => 4,
            'first_name' => 'Nombre4',
            'last_name' => 'Apellido4',
            'date_of_birth' => '1990-01-01',
            'company_id' => 2,
            'user_id' => 4,
        ]);
    }
}
