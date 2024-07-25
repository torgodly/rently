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
            'user_id' => 1,
            'car_id' => \App\Models\Car::factory(),
            'pickup_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'pickup_location_id' => \App\Models\Location::factory(),
            'return_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'return_location_id' => \App\Models\Location::factory(),
            'status' => $this->faker->randomElement(["Pending", "Confirmed", "Active", "Completed", "Cancelled"]),
//            'status' => 'Completed',
            "price" => 1,
            'discount' => 1,

        ];
    }
}
