<?php

namespace Database\Factories;

use DateInterval;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\GiftCard;

class GiftCardFactory extends Factory
{
    protected $model = GiftCard::class;

    public function definition()
    {
        $startDate = now()->addYear();
        $endDate = $startDate->copy()->addMonths(6);

        return [
            'card_number' => $this->faker->unique()->randomNumber(8),
            'due_date' => $this->faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d'),
            'security_code' => $this->faker->randomNumber(3),
        ];
    }
    }
