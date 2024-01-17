<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\GiftCard;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CompanySeeder::class,
            EmployeeSeeder::class,
            BrandSeeder::class,
            GiftCardSeeder::class,
            BenefitSeeder::class,
            VariationSeeder::class,
            OrderSeeder::class]);
    }
}
