<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'make' => $this->faker->randomElement(['Toyota', 'Ford', 'Chevrolet', 'Nissan', 'Honda']),
            'model' => $this->faker->word,
            'manufacturing_year' => $this->faker->year,
            'color' => $this->faker->colorName,
            'license_plate' => $this->faker->unique()->regexify('[A-Z]{3}-[0-9]{3}'),
            'mileage' => $this->faker->numberBetween(0, 200000),
            'transmission_type' => $this->faker->randomElement(['automatic', 'manual']),
            'fuel_type' => $this->faker->randomElement(['gasoline', 'diesel', 'electric']),
            'price_per_day' => $this->faker->randomFloat(2, 50, 500),
            'available' => $this->faker->boolean,
            'branch_id' => \App\Models\Branch::factory(),
            'description' => $this->faker->text,
        ];

    }

    public function configure()
    {
        return $this->afterCreating(function (Car $car) {
            $car->addMediaFromUrl('https://via.placeholder.com/400')
                ->toMediaCollection('images', 'public');

        });
    }
}
