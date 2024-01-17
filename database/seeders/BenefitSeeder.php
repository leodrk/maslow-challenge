<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Benefit;

class BenefitSeeder extends Seeder
{
    public function run()
    {

        Benefit::create([
            'id' => 1,
            'name' => 'Benefit1 for Nike',
            'description' => 'Benefit1',
            'country_of_benefit' => 'ARG',
            'brand_id' => 1,
        ]);

        Benefit::create([
            'id' => 2,
            'name' => 'Benefit2 for Nike',
            'description' => 'Benefit2',
            'country_of_benefit' => 'ARG',
            'brand_id' => 1,
        ]);

        Benefit::create([
            'id' => 3,
            'name' => 'Benefit1 for Ford',
            'description' => 'Benefit1',
            'country_of_benefit' => 'ARG',
            'brand_id' => 2,
        ]);

        Benefit::create([
            'id' => 4,
            'name' => 'Benefit2 for Ford',
            'description' => 'Benefit2',
            'country_of_benefit' => 'ARG',
            'brand_id' => 2,
        ]);
    }
}
