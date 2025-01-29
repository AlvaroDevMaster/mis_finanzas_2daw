<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Spending;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spending>
 */
class SpendingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'category_id' => Category::factory(),
            'description' => $this->faker->sentence(),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
