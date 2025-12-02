<?php

namespace App\Livewire;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TrackBooking extends Component
{
    public $status;
    public $pickupDate;
    public $returnDate;
    public $paymentStatus;

    public $booking;

    public function mount()
    {
        $this->booking = Booking::where('customer_id', Auth::id())
            ->whereNotIn('status', ['completed', 'cancelled'])
            ->orderBy('created_at', 'desc')
            ->first();

        if ($this->booking) {
            $this->status = $this->booking->status;
            $this->paymentStatus = $this->booking->payment_status;
            $this->pickupDate = $this->booking->start_date;
            $this->returnDate = $this->booking->end_date;
        }
    }

    public function cancelBooking()
    {
        if (!$this->booking) return;

        $this->status = 'cancelled';
        $this->booking->status = 'cancelled';
        $this->booking->car->availability_status = 'available';
        $this->booking->save();
        $this->booking->car->save();

        $this->dispatch('notify', 'Booking cancelled successfully!', 'success');

        redirect('/cars')->with('message','booking cancelled');
    }

    public function payNow()
    {
        // integrate payment gateway later
        $this->paymentStatus = "paid";
        // redirect to payment page
        $this->booking->payment_status = "paid";
        $this->booking->save();
        
        $this->dispatch('notify', 'Payment completed successfully!', 'success');
    }


    public function render()
    {
        return view('livewire.track-booking');
    }

}
