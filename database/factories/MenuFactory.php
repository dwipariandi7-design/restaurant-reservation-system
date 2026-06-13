<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    protected $model = Menu::class;

    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'price' => fake()->numberBetween(5000, 100000),
            'image' => 'menus/default.jpg',
            'is_available' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
