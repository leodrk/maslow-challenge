<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Variation;

class VariationSeeder extends Seeder
{
    public function run()
    {
        Variation::create([
            'id' => 1,
            'title' => 'Variation 1 for Benefit 1',
            'local_currency_cost' => 80,
            'local_currency_price' => 100,
            'credits_price' => 10,
            'benefit_id' => 1,
        ]);

        Variation::create([
            'id' => 2,
            'title' => 'Variation 2 for Benefit 1',
            'local_currency_cost' => 120,
            'local_currency_price' => 150,
            'credits_price' => 15,
            'benefit_id' => 2,
        ]);

        Variation::create([
            'id' => 3,
            'title' => 'Variation 1 for Benefit 2',
            'local_currency_cost' => 200,
            'local_currency_price' => 250,
            'credits_price' => 20,
            'benefit_id' => 3,
        ]);

        Variation::create([
            'id' => 4,
            'title' => 'Variation 2 for Benefit 2',
            'local_currency_cost' => 150,
            'local_currency_price' => 180,
            'credits_price' => 15,
            'benefit_id' => 4,
        ]);
    }
}
