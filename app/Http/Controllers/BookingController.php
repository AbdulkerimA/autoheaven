<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * display the booking page
     */
    public function index()
    {
        // $bookings = Booking::where('customer_id',Auth::id())
        //                 ->whereNotIn('status', ['completed', 'cancelled'])
        //                 ->orderBy('created_at', 'desc')
        //                 ->first();

        return view('bookings.index');
    }

    /**
     * store booking to the db
     */
    public function store(Request $request)
    {
        // dd($request->post());
        // Validate form inputs
        $validated = $request->validate([
            'car_id'      => 'required|exists:cars,id',
            'rentDate'    => 'required|date',//|after_or_equal:today',
            'returnDate'  => 'required|date|after:rentDate',
        ]);

        // dd($validated);
        // Get authenticated user
        $customerId = Auth::id();

        // Fetch car
        $car = Car::findOrFail($validated['car_id']);

        // Calculate total days
        $startDate = Carbon::parse($validated['rentDate']);
        $endDate   = Carbon::parse($validated['returnDate']);

        $days = $startDate->diffInDays($endDate);
        if ($days === 0) {  
            $days = 1;     // minimum 1 day charge
        }

        // Calculate price
        $totalPrice = $days * $car->price_per_day;

        // Create booking
        $booking = Booking::create([
            'car_id'        => $car->id,
            'customer_id'   => $customerId,
            'start_date'    => $startDate,
            'end_date'      => $endDate,
            'total_price'   => $totalPrice,
        ]);

        //update car availability
        $car->update([
            'availability_status' => 'booked',
        ]);

        //Redirect with message
        return redirect()->back()->with('success', 'Car rented successfully!');
    }
}
