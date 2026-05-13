<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Restaurant;
use App\Enums\UserRole;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurantUsers = User::where('role', UserRole::Restaurant)->get();

        foreach ($restaurantUsers as $user) {
            Restaurant::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}