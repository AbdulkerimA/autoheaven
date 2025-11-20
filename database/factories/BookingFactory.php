<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('+1 days', '+1 month');
        $end   = (clone $start)->modify('+'.rand(1, 10).' days');
        return [
            'car_id' => Car::factory(),
            'customer_id' => User::factory()->create(['role'=>'customer'])->id,
            'start_date' => $start,
            'end_date' => $end,
            'total_price' => $this->faker->numberBetween(100,1000),
            'status' => $this->faker->randomElement(['pending','confirmed','cancelled','completed']),
            'payment_status' => $this->faker->randomElement(['pending','paid','refunded']),
        ];
    }
}
