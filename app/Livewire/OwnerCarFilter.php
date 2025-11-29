<?php

namespace App\Livewire;

use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class OwnerCarFilter extends Component
{
    use WithPagination;

    /** Filter properties */
    public $search = '';
    public $category = '';
    public $brand = '';
    public $fuel = '';
    public $status = '';

    public $sort = 'name';

    public $showModal = false;
    public $selectedCar;
    protected $listeners = ['open-rent-modal' => 'openModal'];

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

    public function updating($field)
    {
        $this->resetPage(); // reset pagination when any filter changes
    }

    public function render()
    {
        $cars = Car::with('media')
            ->where('owner_id',Auth::id())
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
            ->orderBy(...$this->sortField())
            ->paginate(9);

        return view('livewire.owner-car-filter',['cars' => $cars]);
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
}
