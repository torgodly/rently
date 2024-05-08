<?php

namespace Database\Seeders;

use App\Models\CarReference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CarReferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarReference::unguard();

        $filePath = Storage::disk('local')->path('car_references.sql');

        // Check if the SQL file exists
        if (file_exists($filePath)) {
            // Read the SQL file and execute the queries
            $sqlQueries = file_get_contents($filePath);
            DB::unprepared($sqlQueries);
            $this->command->info('CarReference Table Seed');
        } else {
            $this->command->error('CarReferences SQL file not found!');
        }
    }
}
