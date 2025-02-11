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
    protected $model = Income::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'category_id' => Category::where('type', 'income')->inRandomOrder()->first()->id,
            'description' => $this->faker->sentence(),
            'amount' => $this->faker->randomFloat(2, 10, 1000), // Random amount between 10 and 1000
        ];
    }
}
