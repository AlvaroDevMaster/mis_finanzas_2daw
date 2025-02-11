<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            // Income Categories
            [
                'name' => 'Salary',
                'type' => 'income'
            ],
            [
                'name' => 'Freelance',
                'type' => 'income'
            ],
            [
                'name' => 'Investments',
                'type' => 'income'
            ],
            [
                'name' => 'Rental Income',
                'type' => 'income'
            ],
            [
                'name' => 'Business Income',
                'type' => 'income'
            ],
            [
                'name' => 'Dividends',
                'type' => 'income'
            ],
            [
                'name' => 'Interest',
                'type' => 'income'
            ],
            [
                'name' => 'Gifts',
                'type' => 'income'
            ],
            
            // Expense Categories
            [
                'name' => 'Housing',
                'type' => 'expense'
            ],
            [
                'name' => 'Utilities',
                'type' => 'expense'
            ],
            [
                'name' => 'Transportation',
                'type' => 'expense'
            ],
            [
                'name' => 'Food & Groceries',
                'type' => 'expense'
            ],
            [
                'name' => 'Healthcare',
                'type' => 'expense'
            ],
            [
                'name' => 'Insurance',
                'type' => 'expense'
            ],
            [
                'name' => 'Entertainment',
                'type' => 'expense'
            ],
            [
                'name' => 'Shopping',
                'type' => 'expense'
            ],
            [
                'name' => 'Education',
                'type' => 'expense'
            ],
            [
                'name' => 'Debt Payments',
                'type' => 'expense'
            ],
            [
                'name' => 'Restaurant & Dining',
                'type' => 'expense'
            ],
            [
                'name' => 'Travel',
                'type' => 'expense'
            ],
            [
                'name' => 'Personal Care',
                'type' => 'expense'
            ],
            [
                'name' => 'Subscriptions',
                'type' => 'expense'
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'type' => $category['type']
            ]);
        }
    }
}