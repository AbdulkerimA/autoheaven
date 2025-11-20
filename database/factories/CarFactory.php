<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'owner_id' => User::factory()->create(['role'=>'owner'])->id,
            'name' => $this->faker->word().' '.$this->faker->word(),
            'brand' => $this->faker->randomElement(['Toyota','BMW','Audi','Ford','Tesla']),
            'category' => $this->faker->randomElement(['SUV','Sedan','Hatchback','Convertible','Truck','Other']),
            'price_per_day' => $this->faker->numberBetween(50,500),
            'fuel_type' => $this->faker->randomElement(['Petrol','Diesel','Electric','Hybrid']),
            'transmission' => $this->faker->randomElement(['Automatic','Manual']),
            'seats' => $this->faker->numberBetween(2,8),
            'year' => $this->faker->numberBetween(2005,2025),
            'mileage' => $this->faker->numberBetween(1000,200000),
            'license_plate' => strtoupper($this->faker->bothify('??## ??##')),
            'availability_status' => $this->faker->randomElement(['available','booked','maintenance']),
            'description' => $this->faker->paragraph(),
        ];
    }
}
