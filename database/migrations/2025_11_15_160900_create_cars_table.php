<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users')->cascadeOnDelete();
            $table->string('name');
            $table->string('brand');
            $table->enum('category', ['SUV','Sedan','Hatchback','Convertible','Truck','Other']);
            $table->decimal('price_per_day', 10, 2);
            $table->enum('fuel_type', ['Petrol','Diesel','Electric','Hybrid']);
            $table->enum('transmission', ['Automatic','Manual']);
            $table->integer('seats');
            $table->integer('year');
            $table->integer('mileage')->nullable();
            $table->string('license_plate')->nullable();
            $table->enum('availability_status', ['available','booked','maintenance'])->default('available');
            $table->text('description')->nullable();
            $table->softDeletes();
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
