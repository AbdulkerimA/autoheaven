<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'booking_id' => Booking::factory(),
            'amount' => $this->faker->numberBetween(100,1000),
            'payment_method' => $this->faker->randomElement(['card','paypal','cash','other']),
            'status' => $this->faker->randomElement(['pending','completed','failed','refunded']),
            'transaction_date' => $this->faker->dateTimeBetween('-1 month','now'),
        ];
    }
}
