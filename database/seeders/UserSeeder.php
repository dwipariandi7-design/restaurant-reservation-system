<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin
        $admin = User::create([
            'name' => 'Admin Restaurant',
            'email' => 'admin@restaurant.local',
            'password' => Hash::make('password'),
            'phone' => '0812345678',
            'address' => 'Jl. Merdeka No. 1',
            'city' => 'Jakarta',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('admin');

        // Create Customer Service
        $cs = User::create([
            'name' => 'Customer Service',
            'email' => 'cs@restaurant.local',
            'password' => Hash::make('password'),
            'phone' => '0812345679',
            'address' => 'Jl. Sudirman No. 2',
            'city' => 'Jakarta',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
        $cs->assignRole('customer_service');

        // Create Customers
        $customers = [
            [
                'name' => 'John Doe',
                'email' => 'customer@restaurant.local',
                'phone' => '0812345680',
                'address' => 'Jl. Ahmad Yani No. 3',
                'city' => 'Bandung',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@restaurant.local',
                'phone' => '0812345681',
                'address' => 'Jl. Gatot Subroto No. 4',
                'city' => 'Surabaya',
            ],
            [
                'name' => 'Ahmad Rahman',
                'email' => 'ahmad@restaurant.local',
                'phone' => '0812345682',
                'address' => 'Jl. Diponegoro No. 5',
                'city' => 'Medan',
            ],
        ];

        foreach ($customers as $customerData) {
            $customer = User::create(array_merge($customerData, [
                'password' => Hash::make('password'),
                'is_active' => true,
                'email_verified_at' => now(),
            ]));
            $customer->assignRole('customer');
        }
    }
}
