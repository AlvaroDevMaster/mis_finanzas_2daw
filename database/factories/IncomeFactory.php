<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Income;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
class IncomeFactory extends Factory
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
            'category_id' => Category::factory(), // Generates a new Category if not exists
            'description' => $this->faker->sentence(),
            'amount' => $this->faker->randomFloat(2, 10, 1000), // Random amount between 10 and 1000
        ];
    }
}
