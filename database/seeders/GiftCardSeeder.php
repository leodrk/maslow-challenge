<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GiftCard;

class GiftCardSeeder extends Seeder
{
    public function run()
    {
        GiftCard::factory(10)->create();
    }
}
