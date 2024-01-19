<?php

namespace Database\Factories;

use App\Models\Benefit;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Benefit>
 */
class BenefitFactory extends Factory
{
    protected $model = Benefit::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'country_of_benefit' => $this->faker->regexify('[A-Z]{3}'),
            'brand_id' => function () {
                return Brand::inRandomOrder()->first()->id;
            },
        ];
    }
}
