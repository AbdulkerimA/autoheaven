<?php

namespace App\Livewire;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class TrackBooking extends Component
{
    public $status;
    public $pickupDate;
    public $returnDate;
    public $paymentStatus;

    public $booking;
    public $txRef;


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
    
    // public function getStatusProperty()
    // {
    //     return $this->booking?->status;
    // }

    // public function getPaymentStatusProperty()
    // {
    //     return $this->booking?->payment_status;
    // }

    public function cancelBooking()
    {
        if (
            !$this->booking ||
            in_array($this->booking->status, ['completed', 'ongoing']) ||
            $this->booking->payment_status === 'paid'
        ) {
            $this->dispatch('notify', 'This booking cannot be cancelled.', 'error');
            return;
        }

        DB::transaction(function () {
            $this->booking->update(['status' => 'cancelled']);
            $this->booking->car()->update(['availability_status' => 'available']);
        });

        $this->status = 'cancelled';

        $this->dispatch('notify', 'Booking cancelled successfully!', 'success');

        return redirect()->route('cars.index');
    }


    public function payNow()
    {
        if (!$this->booking || $this->booking->payment_status === 'paid') {
            $this->dispatch('notify', 'This booking is already paid.', 'error');
            return;
        }

        if (in_array($this->booking->status, ['pending', 'cancelled','rejected'])) {
            $this->dispatch('notify', 'Payment is not allowed at this stage.', 'error');
            return;
        }

        $this->txRef = 'BOOKING-' . $this->booking->id . '-' . Str::uuid();
        
        // $this->booking->update([
        //     'tx_ref' => $txRef,
        // ]);

        $this->dispatch('submit-payment-form', txRef: $this->txRef);
    }


    public function render()
    {
        return view('livewire.track-booking');
    }

}
