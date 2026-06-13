<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Appetizer', 'description' => 'Makanan pembuka'],
            ['name' => 'Soup', 'description' => 'Sup hangat'],
            ['name' => 'Salad', 'description' => 'Salad segar'],
            ['name' => 'Main Course', 'description' => 'Hidangan utama'],
            ['name' => 'Dessert', 'description' => 'Pencuci mulut'],
            ['name' => 'Beverage', 'description' => 'Minuman'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
