<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'statut' => OrderStatus::EnAttente,
            'mode' => fake()->randomElement(['sur place', 'à emporter']),
            'heure_souhaitee' => null,
            'notes' => null,
            'sous_total' => fake()->randomFloat(0, 10000, 10000),
            'frais_services' => 500,
            'Total' => function (array $attributes) {
                return $attributes['sous_total'] + $attributes['frais_services'];
            },
        ];
    }
}
