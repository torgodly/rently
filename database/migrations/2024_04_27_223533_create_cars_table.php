<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('make');
            $table->string('model');
            $table->year('manufacturing_year');
            $table->string('body_style');
            $table->string('color');
            $table->string('license_plate')->unique();
            $table->unsignedInteger('mileage');
            $table->unsignedInteger('mileage_to_service');
            $table->integer('seats');
            $table->enum('transmission_type', ['automatic', 'manual']);
            $table->string('fuel_type',);
            $table->decimal('price_per_day', 8, 2);
            $table->integer('discount', )->default(0);
            $table->decimal('price_per_day_discount', 8, 2)->nullable();
            $table->boolean('available')->default(true);
            $table->foreignId('branch_id')->constrained();
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'service'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
