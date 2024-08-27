<?php

namespace Database\Factories;

use App\Enums\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'manager_id' => \App\Models\User::factory()->create([
                'email' => $this->faker->unique()->safeEmail,
                'type' => UserType::Manager->value,
            ]),
            'status' => true,
        ];
    }
}
