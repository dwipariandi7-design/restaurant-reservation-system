<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $names = ['Appetizer', 'Main Course', 'Dessert', 'Beverage', 'Soup', 'Salad'];
        
        return [
            'name' => fake()->randomElement($names),
            'description' => fake()->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
