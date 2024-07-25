<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                    "مطار طرابلس الدولي",
                    "مطار معيتيقة الدولي",
                    "مطار بنينا الدولي",
                    "مطار غات الدولي",
                    "فندق القبة بطرابلس",
                    "فندق المهاري في بنغازي",
                    "فندق الفورسيزونز في طرابلس",
                    "فندق الفالكون في مصراتة",
                    "فندق الجمهورية في سبها"
                ]
            ),
            'long' => $this->faker->longitude,
            'lat' => $this->faker->latitude,
            'branch_id' => 1
        ];
    }
}
