<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Car;
use App\Models\CarMedia;
use App\Models\Booking;
use App\Models\Review;
use App\Models\Transaction;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Wrap seeding in a transaction to keep DB consistent on failure
        DB::transaction(function () {
            // 1) Admin
            User::factory()->create([
                'name' => 'Super Admin',
                'email' => 'admin@autoheaven.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]);

            // 2) Create Owners (5)
            $owners = User::factory()
                ->count(5)
                ->state(['role' => 'owner'])
                ->create();

            // 3) Create Customers (5)
            $customers = User::factory()
                ->count(5)
                ->state(['role' => 'customer'])
                ->create();

            // 4) Create Cars
            // Create 2 cars per owner -> 10 cars total (>=5)
            $cars = collect();
            foreach ($owners as $owner) {
                $created = Car::factory()
                    ->count(2)
                    ->create([
                        'owner_id' => $owner->id,
                    ]);
                $created->each(fn($c) => $cars->push($c));
            }

            // Ensure at least 5 cars exist (safety)
            if ($cars->count() < 5) {
                $extra = Car::factory()->count(5 - $cars->count())->create([
                    'owner_id' => $owners->random()->id,
                ]);
                $extra->each(fn($c) => $cars->push($c));
            }

            // 5) Create Car Media (at least 5 total)
            // Create 2 media per car for the first 3 cars (=> 6 media)
            $cars->take(3)->each(function ($car) {
                CarMedia::factory()->count(2)->create([
                    'car_id' => $car->id,
                ]);
            });

            // If still less than 5, create more random media
            if (CarMedia::count() < 5) {
                $needed = 5 - CarMedia::count();
                CarMedia::factory()->count($needed)->create([
                    'car_id' => $cars->random()->id,
                ]);
            }

            // 6) Create Bookings (at least 5)
            $bookings = collect();
            // Create 5 bookings, associate random customers and cars
            for ($i = 0; $i < 5; $i++) {
                $car = $cars->random();
                $customer = $customers->random();

                $start = now()->addDays(rand(1, 14))->toDateString();
                $end = now()->addDays(rand(15, 30))->toDateString();

                $booking = Booking::factory()->create([
                    'car_id' => $car->id,
                    'customer_id' => $customer->id,
                    'start_date' => $start,
                    'end_date' => $end,
                    'total_price' => $car->price_per_day * rand(1, 7),
                    'status' => 'confirmed',
                    'payment_status' => 'paid',
                ]);

                $bookings->push($booking);
            }

            // 7) Create Transactions for each booking (one-to-one)
            foreach ($bookings as $booking) {
                Transaction::factory()->create([
                    'booking_id' => $booking->id,
                    'amount' => $booking->total_price,
                    'status' => 'completed',
                    'payment_method' => 'card',
                ]);
            }

            // 8) Create Reviews (at least 5)
            // Create reviews from random customers to random cars
            for ($i = 0; $i < 5; $i++) {
                Review::factory()->create([
                    'car_id' => $cars->random()->id,
                    'customer_id' => $customers->random()->id,
                    'rating' => rand(3, 5),
                ]);
            }

            // Done
        });
    }
}
