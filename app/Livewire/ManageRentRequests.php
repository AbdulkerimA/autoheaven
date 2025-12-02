<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManageRentRequests extends Component
{
    public $search = '';
    public $statusFilter = 'all';
    public $dateFilter = 'all';
    public $currentRequest = null;

    public $cars;
    public $bookings;
    public $filteredRequests;


    public function mount()
    {
        // Get all booked cars of the current owner
        $this->cars = Car::where('owner_id', Auth::id())
            ->where('availability_status', 'booked')
            ->pluck('id');

        // Get bookings for these cars
        $this->bookings = Booking::with('car.media', 'customer')
            ->whereIn('car_id', $this->cars)
            ->get();

        $this->filteredRequests = $this->bookings;
    }

    public function updatedSearch()
    {
        $this->applyFilters();
    }

    public function updatedStatusFilter()
    {
        $this->applyFilters();
    }

    public function updatedDateFilter()
    {
        $this->applyFilters();
    }

    public function applyFilters()
    {
        $this->filteredRequests = $this->bookings
            ->filter(function ($request) {
                // ---- SEARCH FILTER ----
                $search = strtolower($this->search);

                $matchesSearch =
                    $search === '' ||
                    str_contains(strtolower($request->customer->name), $search) ||
                    str_contains(strtolower($request->car->name), $search) ||
                    str_contains(strtolower($request->booking_id), $search);

                // ---- STATUS FILTER ----
                $matchesStatus =
                    $this->statusFilter === 'all' ||
                    $request->status === $this->statusFilter;

                // ---- DATE FILTER ----
                $matchesDate = match ($this->dateFilter) {
                    'today' => $request->created_at->isToday(),
                    'this_week' => $request->created_at->isCurrentWeek(),
                    'this_month' => $request->created_at->isCurrentMonth(),
                    'upcoming' => $request->start_date >= now(),
                    default => true, // 'all'
                };

                return $matchesSearch && $matchesStatus && $matchesDate;
            })
            ->values(); // keep as a Collection of models
    }

    public function viewDetails($id)
    {
        $this->currentRequest = $this->bookings->firstWhere('id', $id);
    }

    public function completed($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->status = 'completed';
            $booking->car->availability_status = 'available';
            $booking->save();
            $booking->car->save();

            // Remove from local collections
            $this->bookings = $this->bookings->reject(fn ($b) => $b->id == $id);
            $this->applyFilters();

            $this->dispatch('notify', 'deal is completed successfully!', 'success');
            $this->updateLocalBooking($id, 'completed');
        }
    }

    public function remove($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->delete();

            $this->dispatch('notify', 'request removed successfully!', 'success');
        }
    }

    public function acceptRequest($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->status = 'confirmed';
            $booking->save();

            $this->updateLocalBooking($id, 'confirmed');
        }
    }

    public function rejectRequest($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->status = 'cancelled';
            $booking->car->availability_status = 'available';
            $booking->save();
            $booking->car->save();

            $this->updateLocalBooking($id, 'cancelled');
        }
    }

    private function updateLocalBooking($id, $status)
    {
        $booking = $this->bookings->firstWhere('id', $id);
        if ($booking) {
            $booking->status = $status;
            $this->applyFilters();
        }
    }

    public function closeModal()
    {
        $this->currentRequest = null;
    }

    public function render()
    {
        return view('livewire.manage-rent-requests');
    }
}
