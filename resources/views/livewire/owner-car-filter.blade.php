<div class="">
    <!-- Search Bar -->
    <div class="search-container mb-12 fade-in" style="animation-delay: 0.2s;">
        <input type="text"
            placeholder="Search your cars..." class="search-input" id="searchInput" wire:model="search" wire:change="$refresh">
        <svg class="search-icon" width="20" height="20" fill="currentColor" viewbox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                clip-rule="evenodd" />
        </svg>
    </div>
    <!-- Main Content Container -->
    <div class="glass-panel max-w-7xl mx-auto p-8 fade-in mt-8" style="animation-delay: 0.4s;"><!-- Filters Row -->
        <div class="filters-row flex flex-wrap gap-4 mb-8 justify-center"><select class="filter-select"
                id="categoryFilter" wire:model="category" wire:change="$refresh" >
                <option value="">All Categories</option>
                <option value="SUV">SUV</option>
                <option value="Van">VAN</option>
                <option value="Sedan">Sedan</option>
                <option value="Hatchback">Hatchback</option>
                <option value="Sports">Sports</option>
            </select> 

            <select class="filter-select" id="brandFilter" wire:model="brand" wire:change="$refresh">
                <option value="">All Brands</option>
                <option value="BMW">BMW</option>
                <option value="Mercedes">Mercedes</option>
                <option value="Audi">Audi</option>
                <option value="Toyota">Toyota</option>
                <option value="Porsche">Porsche</option>
            </select> 
            
            <select class="filter-select" id="priceFilter" wire:model="status" wire:change="$refresh" >
                <option value="">All Status</option>
                <option value="available">Available</option>
                <option value="booked">booked</option>
                <option value="maintenance">on maintenance</option>
            </select> 
            
            <select class="filter-select" wire:model="fuel" wire:change="$refresh">
                <option value="">All Fuel Types</option>
                <option value="Petrol">Petrol</option>
                <option value="Diesel">Diesel</option>
                <option value="Hybrid">Hybrid</option>
                <option value="Electric">Electric</option>
            </select>
        </div>
        <!-- Car Cards Grid -->
        <div class="car-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="carGrid">
            @forelse($cars as $car)
                <x-car-card :car="$car"/>
            @empty
                <div class="col-span-3 flex flex-col justify-center items-center">
                    <div class="p-4 rounded-full m-2 bg-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 24 24" fill="" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M18 6l-12 12" />
                            <path d="M6 6l12 12" />
                        </svg>
                        </div>
                    <p class="text-gray-400 text-lg font-bold">No car found.</p>
                </div>
            @endforelse
        </div>
    </div>

</div>