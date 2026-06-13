<?php

namespace Database\Seeders;

use App\Models\RestaurantSetting;
use Illuminate\Database\Seeder;

class RestaurantSettingSeeder extends Seeder
{
    public function run(): void
    {
        RestaurantSetting::create([
            'restaurant_name' => 'Restaurant Reservation System',
            'logo' => null,
            'address' => 'Jl. Merdeka No. 1, Jakarta Pusat',
            'phone' => '+62 21 123 4567',
            'email' => 'info@restaurant.local',
            'opening_time' => '10:00',
            'closing_time' => '23:00',
            'description' => 'Sistem reservasi restoran modern dengan layanan terbaik',
        ]);
    }
}
