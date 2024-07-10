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
        $location = \App\Models\Location::factory();
        $car = \App\Models\Car::factory();
        return [
            'user_id' => \App\Models\User::factory(),
            'car_id' => $car,
            'pickup_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'pickup_location_id' => $location,
            'return_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'return_location_id' => $location,
            'status' => $this->faker->randomElement(["Pending", "Confirmed", "Active", "Completed", "Cancelled"]),
            "price" => 1,
            'discount' => 1,

        ];
    }
}
