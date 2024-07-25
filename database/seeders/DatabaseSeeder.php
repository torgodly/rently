<?php

namespace Database\Seeders;

use App\Models\Branch;
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
//        $location = \App\Models\Location::factory();
//        $branch = \App\Models\Branch::factory()->create();
//        $car = \App\Models\Car::factory(10)->create();
        \App\Models\User::factory()->create();
        Branch::factory(4)->create();
        Order::factory(100)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
            'type' => 'admin',
        ]);

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@user.com',
            'type' => 'user',
        ]);
    }
}
