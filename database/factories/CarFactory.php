<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Car;
use App\Models\CarReference;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $type = CarReference::inRandomOrder()->first();
        return [
            'make' => $type->make,
            'model' => $type->model,
            'manufacturing_year' => $this->faker->year,
            'body_style' => json_decode($type->body_style)[array_rand(json_decode($type->body_style))],
            'color' => $this->faker->colorName,
            'license_plate' => $this->faker->unique()->regexify('[A-Z]{3}-[0-9]{3}'),
            'mileage' => $this->faker->numberBetween(0, 200000),
            'mileage_to_service' => $this->faker->numberBetween(0, 10000),
            'seats' => $this->faker->numberBetween(2, 8),
            'transmission_type' => $this->faker->randomElement(['automatic', 'manual']),
            'fuel_type' => $this->faker->randomElement(['gasoline', 'diesel', 'electric']),
            'price_per_day' => $this->faker->randomFloat(2, 50, 500),
            'available' => $this->faker->boolean,
            'branch_id' => Branch::inRandomOrder()->first(),
            'description' => $this->faker->text,
        ];

    }

    public function configure()
    {
        $carImagesPath = public_path('cars'); // Path to the directory containing car images

        // Get all image files from the directory
        $carImages = File::files($carImagesPath);

        return $this->afterCreating(function (Car $car) use (&$carImages) {
            // Choose a random image for the current car
            $randomIndex = array_rand($carImages);
            $randomImage = $carImages[$randomIndex];

            // Remove the used image from the array to prevent reuse
            unset($carImages[$randomIndex]);

            // Define the destination path in the storage directory
            $copiedImagePath = 'cars_images/' . basename($randomImage);

            // Copy the image file to the storage directory
            Storage::disk('local')->put($copiedImagePath, File::get($randomImage->getPathname()));

            // Add the copied image to the media collection of the current car
            $car->addMedia(storage_path('app/' . $copiedImagePath))
                ->toMediaCollection('car_images', 'public');
        });
    }
}
