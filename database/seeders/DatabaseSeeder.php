<?php

namespace Database\Seeders;

use App\Models\CarReference;
use App\Models\Order;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        Car::factory(1)->create();
        // User::factory(10)->create();
        Voucher::factory(100)->create();
        $this->call(CarReferencesTableSeeder::class);
        Order::factory(4)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
        ]);
    }
}
