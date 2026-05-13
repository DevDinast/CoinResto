<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::with('restaurant')->get();

        foreach ($categories as $category) {
            $numberOfProducts = rand(4, 8);

            Product::factory()
                ->count($numberOfProducts)
                ->create([
                    'category_id' => $category->id,
                    'restaurant_id' => $category->restaurant_id,
                ]);
        }
    }
}