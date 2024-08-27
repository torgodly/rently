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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('car_id')->constrained()->onDelete('cascade');
            $table->dateTime('pickup_date');
            $table->foreignId('pickup_location_id')->constrained('locations');
            $table->dateTime('return_date');
            $table->foreignId('return_location_id')->constrained('locations');
            $table->enum('status', ["Pending","Confirmed","Active","Completed","Cancelled"])->default('Pending');
            $table->decimal('price', 8, 2);
            $table->integer('discount')->default(0);
            $table->string('cancel_reason')->nullable();
            $table->foreignId('canceled_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
