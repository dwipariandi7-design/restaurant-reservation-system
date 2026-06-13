<?php

namespace Database\Factories;

use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;

class TableFactory extends Factory
{
    protected $model = Table::class;

    public function definition(): array
    {
        return [
            'table_number' => fake()->unique()->numberBetween(1, 50),
            'capacity' => fake()->randomElement([2, 4, 6, 8]),
            'location' => fake()->randomElement(['Indoor', 'Outdoor', 'VIP']),
            'status' => 'available',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
