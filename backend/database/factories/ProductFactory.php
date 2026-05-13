<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'description' => fake()->sentence(8),
            'price' => fake()->randomFloat(0, 500, 5000),
            'photo' => null,
            'is_available' => true,
            'temps_preparation' => fake()->numberBetween(5, 30),
        ];
    }
}
