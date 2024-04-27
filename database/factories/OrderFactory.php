<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
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
            'user_id' => \App\Models\User::factory(),
            'car_id' => \App\Models\Car::factory(),
            'pickup_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'return_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'order_status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
