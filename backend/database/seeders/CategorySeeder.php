<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {

            $numberOfCategories = rand(3, 5);

            Category::factory()
                ->count($numberOfCategories)
                ->create([
                    'restaurant_id' => $restaurant->id,
                ]);
        }
    }
}