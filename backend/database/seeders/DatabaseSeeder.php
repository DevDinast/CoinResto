<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RestaurantSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\OrderSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RestaurantSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
        ]);
    }
}