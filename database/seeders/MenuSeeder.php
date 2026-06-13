<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $appetizers = [
            ['name' => 'Beef Satay', 'description' => 'Sate daging sapi dengan kacang', 'price' => 45000],
            ['name' => 'Spring Roll', 'description' => 'Lumpia udang crispy', 'price' => 35000],
            ['name' => 'Fried Calamari', 'description' => 'Cumi-cumi goreng renyah', 'price' => 55000],
        ];

        $soups = [
            ['name' => 'Chicken Soup', 'description' => 'Sup ayam hangat dengan sayuran', 'price' => 30000],
            ['name' => 'Seafood Soup', 'description' => 'Sup laut segar', 'price' => 50000],
            ['name' => 'Vegetable Soup', 'description' => 'Sup sayuran sehat', 'price' => 25000],
        ];

        $salads = [
            ['name' => 'Caesar Salad', 'description' => 'Salad caesar klasik', 'price' => 40000],
            ['name' => 'Greek Salad', 'description' => 'Salad Yunani fresh', 'price' => 45000],
            ['name' => 'Seafood Salad', 'description' => 'Salad laut premium', 'price' => 60000],
        ];

        $mainCourses = [
            ['name' => 'Grilled Salmon', 'description' => 'Salmon panggang dengan sauce lemon', 'price' => 120000],
            ['name' => 'Beef Steak', 'description' => 'Steak daging sapi premium', 'price' => 150000],
            ['name' => 'Chicken Teriyaki', 'description' => 'Ayam dengan saus teriyaki', 'price' => 85000],
            ['name' => 'Pasta Carbonara', 'description' => 'Pasta Italia klasik', 'price' => 75000],
            ['name' => 'Shrimp Garlic', 'description' => 'Udang dengan bawang putih', 'price' => 95000],
        ];

        $desserts = [
            ['name' => 'Chocolate Cake', 'description' => 'Kue coklat lezat', 'price' => 35000],
            ['name' => 'Cheesecake', 'description' => 'Kue keju premium', 'price' => 45000],
            ['name' => 'Tiramisu', 'description' => 'Tiramisu Italia', 'price' => 40000],
            ['name' => 'Ice Cream', 'description' => 'Es krim pilihan', 'price' => 25000],
        ];

        $beverages = [
            ['name' => 'Soft Drink', 'description' => 'Minuman ringan', 'price' => 15000],
            ['name' => 'Juice', 'description' => 'Jus segar', 'price' => 20000],
            ['name' => 'Coffee', 'description' => 'Kopi pilihan', 'price' => 18000],
            ['name' => 'Tea', 'description' => 'Teh hangat', 'price' => 12000],
            ['name' => 'Wine', 'description' => 'Wine import', 'price' => 80000],
        ];

        $categories = [
            'Appetizer' => $appetizers,
            'Soup' => $soups,
            'Salad' => $salads,
            'Main Course' => $mainCourses,
            'Dessert' => $desserts,
            'Beverage' => $beverages,
        ];

        foreach ($categories as $categoryName => $menus) {
            $category = Category::where('name', $categoryName)->first();
            foreach ($menus as $menu) {
                Menu::create(array_merge($menu, [
                    'category_id' => $category->id,
                    'image' => 'menus/default.jpg',
                    'is_available' => true,
                ]));
            }
        }
    }
}
