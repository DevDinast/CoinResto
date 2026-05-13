<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Enums\UserRole;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN
        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@coinresto.com',
            'telephone' => '900000000',
            'password' => Hash::make('password'),
            'role' => UserRole::Admin,
            'is_active' => true,
        ]);

        // RESTAURANTS
        User::factory()
            ->count(5)
            ->create([
                'role' => UserRole::Restaurant,
            ]);

        // CLIENTS
        User::factory()
            ->count(20)
            ->create([
                'role' => UserRole::Client,
            ]);
    }
}