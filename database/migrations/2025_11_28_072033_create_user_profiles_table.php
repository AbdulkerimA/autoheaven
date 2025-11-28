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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();

            // Link to users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('role',['owner','customer'])->default('user');
            // Profile photo
            $table->string('profile_picture')->nullable();
            // Personal info
            $table->string('phone');
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female'])->nullable();
            // Address
            $table->string('street');
            $table->string('city');
            $table->string('region');
            // Driver’s license (optional)
            $table->string('license_number');
            $table->string('license_photo');
            // Emergency contact
            $table->string('emergency_name');
            $table->string('emergency_phone');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
