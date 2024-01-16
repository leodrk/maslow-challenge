<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $companiesData = [
            ['id' => 1, 'legal_name' => 'Coca Cola', 'billing_address' => 'Address 1'],
            ['id' => 2, 'legal_name' => 'Pepsi', 'billing_address' => 'Address 2'],
            ['id' => 3, 'legal_name' => 'Manaos', 'billing_address' => 'Address 3'],
        ];

        foreach ($companiesData as $companyData) {
            Company::create($companyData);
        }
    }
}
