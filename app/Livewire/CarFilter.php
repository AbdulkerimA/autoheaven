<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CarFilter extends Component
{
    use WithPagination;

    /** Filter properties */
    public $search = '';
    public $category = '';
    public $brand = '';
    public $fuel = '';
    public $status = '';
    public $maxPrice = 500000;

    public $sort = 'name';

    public $showModal = false;
    public $selectedCar;
    protected $listeners = ['open-rent-modal' => 'openModal','open-review-modal' => 'openReviewModal'];

    protected $queryString = [
        'search',
        'category',
        'brand',
        'fuel',
        'status',
        'maxPrice',
        'sort',
        'page'
    ];

    public $showReviewModal = false;
    public $rating = 0;
    public $comment = '';

    public function updating($field)
    {
        $this->resetPage(); // reset pagination when any filter changes
    }

    public function render()
    {
        $cars = Car::with('media')
            ->when($this->search, function($q) {
                $q->where(function($query) {
                    $query->where('name', 'like', "%{$this->search}%")
                        ->orWhere('brand', 'like', "%{$this->search}%");
                });
            })
            ->when($this->category, fn($q) => $q->where('category', $this->category))
            ->when($this->brand, fn($q) => $q->where('brand', $this->brand))
            ->when($this->fuel, fn($q) => $q->where('fuel_type', $this->fuel))
            ->when($this->status, fn($q) => $q->where('availability_status', $this->status))
            ->when($this->maxPrice, fn($q) => $q->where('price_per_day', '<=', $this->maxPrice))
            ->orderBy(...$this->sortField())
            ->paginate(9);

        return view('livewire.car-filter', ['cars' => $cars]);
    }

    private function sortField()
    {
        return match ($this->sort) {
            'price-low'  => ['price_per_day', 'asc'],
            'price-high' => ['price_per_day', 'desc'],
            'rating'     => ['year', 'desc'], // adjust if you add rating column
            'year'       => ['created_at', 'desc'],
            default      => ['created_at', 'desc']
        };
    }

    // modal functions
    public function openModal($carId)
    {
        $this->selectedCar = Car::find($carId);
        $this->showModal = true;
    }

    public function closeModal(){
        $this->showModal = false;
    }

    public function openReviewModal($carId)
    {
        $this->selectedCar = Car::findOrFail($carId);
        $this->rating = 0;
        $this->comment = '';
        $this->showReviewModal = true;
    }

    public function closeReviewModal()
    {
        $this->showReviewModal = false;
    }


    public function submitReview()
    {
        $this->authorize('create', [Review::class, $this->selectedCar]);

        $this->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        
        $this->selectedCar->reviews()->create([
            'customer_id' => Auth::id(),
            'rating'      => $this->rating,
            'comment'     => $this->comment,
        ]);

        $this->closeReviewModal();

        session()->flash('success', 'Review submitted successfully!');
    }

}
