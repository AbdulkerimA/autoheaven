<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function verify(Request $request)
    {
        // dd($request->all());
        $txRef = $request->query('tx_ref');

        if (!$txRef) {
            return redirect()->route('booking.index')
                ->with('error', 'Invalid payment reference.');
        }

        $parts = explode('-', $txRef);
        $bookingId = $parts[1];

        $booking = Booking::where('id', $bookingId)->firstOrFail();

        // dd($bookingId,$booking);

        // Prevent double payment
        if ($booking->payment_status === 'paid') {
            return redirect()->route('booking.index')
                ->with('success', 'Payment already verified.');
        }

        // $response = Http::withToken(config('chapa.secret_key'))
        //     ->get("https://api.chapa.co/v1/transaction/verify/{$txRef}");

        // if (!$response->successful()) {
        //     return redirect()->route('booking.index')
        //         ->with('error', 'Payment verification failed.');
        // }

        // $data = $response->json('data');
        
        DB::transaction(function () use ($booking) {
            $booking->update([
                'payment_status' => 'paid',
                // 'paid_at' => now(),
                // 'status' => 'approved',
            ]);
            Transaction::create([
                'booking_id'        => $booking->id,
                'payment_method'    => 'card',
                'transaction_date'  => now(),
                'status'            => 'completed',
                'amount'            => $booking->total_price,
            ]);
        });

        return redirect()->route('booking.index')
            ->with('success', 'Payment completed successfully.');
    }
}
