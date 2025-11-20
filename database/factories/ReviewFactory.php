<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'car_id' => Car::factory(),
            'customer_id' => User::factory()->create(['role'=>'customer'])->id,
            'rating' => $this->faker->numberBetween(1,5),
            'comment' => $this->faker->optional()->paragraph(),
        ];
    }
}
