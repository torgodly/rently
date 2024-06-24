<?php

namespace Database\Seeders;

use App\Models\CarReference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CarReferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        CarReference::unguard();

        $filePath = public_path('carDatabase/car_references.sql');

        // Check if the SQL file exists
        if (File::exists($filePath)) {
            // Read the SQL file and execute the queries
            $sqlQueries = File::get($filePath);
            DB::unprepared($sqlQueries);
            $this->command->info('CarReference Table Seeded');
        } else {
            $this->command->error('CarReferences SQL file not found!');
        }

        CarReference::reguard();
    }
}
