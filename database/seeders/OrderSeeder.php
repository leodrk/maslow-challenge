<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 4; $i++) {
            Order::create([
                'local_currency_cost' => rand(50, 100),
                'local_currency_price' => rand(80, 120),
                'credits_price' => ($i + 1) * 5,
                'employee_id' => $i,
                'variation_id' => $i,
                'gift_card_id' => rand(1, 10),
            ]);
        }
    }
}
