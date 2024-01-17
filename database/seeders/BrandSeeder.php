<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run()
    {

        Brand::create([
            'id' => 1,
            'name' => 'Nike',
            'description' => 'zapatillas',
        ]);

        Brand::create([
            'id' => 2,
            'name' => 'Ford',
            'description' => 'autos',
        ]);
    }
}
