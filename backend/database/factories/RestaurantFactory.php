<?php

namespace Database\Factories;

use App\Models\Restaurant;
use App\Enums\RestaurantStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    protected $model = Restaurant::class;

    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'description' => fake()->paragraph(),
            'logo' => null,
            'address' => fake()->address(),
            'longitude' => fake()->longitude(),
            'latitude' => fake()->latitude(),
            'telephone' => fake()->phoneNumber(),
            'horaires' => [
                "lundi" => "09:00-18:00",
                "mardi" => "09:00-18:00",
                "mercredi" => "09:00-18:00",
                "jeudi" => "09:00-18:00",
                "vendredi" => "09:00-18:00",
                "samedi" => "10:00-16:00",
                "dimanche" => "Fermé"
            ],
            'note_moyenne' => fake()->randomFloat(1, 2, 5),
            'status' => RestaurantStatus::Actif,
            'plan_abonnement' => 'gratuit',
            'commission_taux' => 15.00,
        ];
    }
}