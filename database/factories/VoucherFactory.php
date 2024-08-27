<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voucher>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => implode('-', [
                Str::random(3),
                Str::random(3),
                Str::random(3),
                Str::random(4)
            ]),
            'value' => $this->faker->randomFloat(2, 0, 100),
//            'status' => $this->faker->randomElement(['active', 'inactive']),
            'expiry_date' => $this->faker->dateTimeBetween('now', '+1 year'),
//            'user_id' => null,
        ];
    }
}
