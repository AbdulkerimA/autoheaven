    <div class="flex gap-8">

        <!-- SIDEBAR FILTERS (your exact UI, Livewire-bound) -->
        <aside class="desktop-sidebar w-80 sidebar-compact rounded-2xl shadow-xl p-6 h-fit sticky top-24">
            <h2 class="text-lg font-bold text-white mb-6">Filters</h2>

            <!-- CATEGORY -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-white mb-3">Category</label>
                <select wire:model="category" wire:change="$refresh" class="filter-input w-full px-4 py-3 rounded-lg text-sm">
                    <option value="">All Categories</option>
                    <option value="SUV">SUV</option>
                    <option value="Sedan">Sedan</option>
                    <option value="Convertible">Convertible</option>
                    <option value="Sports">Sports</option>
                    <option value="Luxury">Luxury</option>
                </select>
            </div>

            <!-- BRAND -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-white mb-3">Brand</label>
                <select wire:model="brand"  wire:change="$refresh" class="filter-input w-full px-4 py-3 rounded-lg text-sm">
                    <option value="">All Brands</option>
                    <option value="Tesla">Tesla</option>
                    <option value="BMW">BMW</option>
                    <option value="Mercedes">Mercedes</option>
                    <option value="Audi">Audi</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Ford">Ford</option>
                    <option value="Honda">Honda</option>
                    <option value="Porsche">Porsche</option>
                </select>
            </div>

            <!-- STATUS -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-white mb-3">Availablity</label>
                <select wire:model="status"  wire:change="$refresh" class="filter-input w-full px-4 py-3 rounded-lg text-sm">
                    <option value="">All</option>
                    <option value="available">available</option>
                    <option value="booked">booked</option>
                    <option value="maintenance">on maintenance</option>
                </select>
            </div>

            <!-- FUEL TYPE -->
            <div class="mb-6 flex flex-col gap-2">
                <label class="block text-sm font-semibold text-white mb-3">Fuel Type</label>
                {{-- '' => 'All', 'petrol' => 'Petrol', 'diesel' => 'Diesel', 'electric' => 'Electric', 'hybrid' => 'Hybrid'] --}}
                <select wire:model="fuel"  wire:change="$refresh" class="filter-input w-full px-4 py-3 rounded-lg text-sm">
                    <option value="">All fuel Types</option>
                    <option value="Petrol">petrol</option>
                    <option value="Diesel">diesel</option>
                    <option value="Electric">electric</option>
                    <option value="Hybrid">hybrid</option>
                </select>
            </div>
            <!-- PRICE RANGE -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-white mb-3">Price Range</label>
                <input type="range" wire:model.debounce.300ms="maxPrice" wire:change="$refresh" min="50" max="500" class="w-full">

                <div class="flex justify-between text-sm text-gray-400">
                    <span>$50</span>
                    <span class="text-yellow-400 font-semibold">Up to ${{ $maxPrice }}</span>
                    <span>$500</span>
                </div>
            </div>
        </aside>

        <!-- MAIN CAR GRID -->
        <div class="flex-1">

            <!-- Search -->
            <div class="mb-6">
                <input wire:model.debounce.300ms="search"
                    wire:change="$refresh"
                    type="text"
                    placeholder="Search cars by name, model, or brand..."
                    class="w-full px-6 py-4 pl-14 rounded-2xl bg-gray-800 border border-gray-700 text-white text-lg search-glow">
            </div>

            <!-- Sort -->
            <div class="flex justify-between items-center mb-6">
                <p class="text-gray-400">Showing {{ $cars->total() }} cars</p>
                <select wire:model="sort" wire:change="$refresh" class="filter-input px-4 py-2 rounded-lg text-sm">
                    <option value="name">Sort by Name</option>
                    <option value="price-low">Price: Low to High</option>
                    <option value="price-high">Price: High to Low</option>
                    <option value="year">Newest First</option>
                </select>
            </div>

            <!-- CAR GRID -->
            <div class="w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-12 p-0">
                @forelse($cars as $car)
                    <x-car-card :car="$car"/>
                @empty
                    <div class="col-span-3 flex justify-center items-center bg-gray-900">
                        <p class="text-gray-400">No cars found.</p>
                    </div>
                @endforelse
            </div>

            <!-- PAGINATION -->
            <div class="mt-6">
                {{ $cars->links() }}
            </div>
        </div>
        <!--BOOK CAR MODAL -->
        <div id="modal" 
             class="modal {{ $showModal ? 'show' : '' }}"
             style="{{ $showModal ? 'display: flex;' : 'display: none;' }}">

            <div class="modal-content">
                
                <div class="flex justify-between items-center mb-6">

                    <h2 style="font-size: 28px; font-weight: 700;">
                        {{ $selectedCar?->name }}
                    </h2>

                    <button wire:click="closeModal"
                        class="bg:none text-gray-400 text-2xl cursor-pointer hover:text-yellow-500"
                        style="font-size: 28px;">
                        ×
                    </button>

                </div>

                <div class="text-yellow-500 mb-6 grid grid-cols-2 gap-4">
                    @if($selectedCar)
                        <p><strong  class="text-gray-400">Brand:</strong> {{ $selectedCar->brand }}</p>
                        <p><strong  class="text-gray-400">Price Per Day:</strong> {{ $selectedCar->price_per_day }} Birr</p>
                        <p><strong  class="text-gray-400">Car Type</strong> {{ $selectedCar->category }}</p>
                        <p><strong  class="text-gray-400">fuel type:</strong> {{ $selectedCar->fuel_type }} </p>
                        <form action="/rent" method="post" class="col-span-2" id="rentForm">
                            @csrf
                            <div>
                                <input type="hidden" name="car_id" value="{{ $selectedCar->id }}">
                                <label class="mb-1 block text-white font-semibold" >From When</label>
                                <input type="datetime-local" name="rentDate"
                                        class="w-full px-3 py-2 border rounded-lg text-white mb-4"
                                        style="background: rgba(28, 37, 46, 0.8); border: 1px solid rgba(255, 255, 255, 0.1);">
                            </div>
                            <div class="">
                                <label class="mb-1 block text-white font-semibold" >To When</label>
                                <input type="datetime-local" name="returnDate"
                                        class="w-full px-3 py-2 border rounded-lg text-white"
                                        style="background: rgba(28, 37, 46, 0.8); border: 1px solid rgba(255, 255, 255, 0.1);">
                            </div>
                        </form>
                    @endif
                </div>

                <div class="flex justify-end gap-4">
                    <button wire:click="closeModal" class="btn-outline text-red-400">Cancel</button>
                    <button id="modalAction" type="submit" form="rentForm" class="btn-primary text-yellow-500">Confirm</button>
                </div>

            </div>
        </div>
        {{-- review modal --}}
        {{-- @dump($showReviewModal) --}}
        <div id="modal"
            class="modal {{ $showReviewModal ? 'show' : '' }}"
            style="{{ $showReviewModal ? 'display: flex;' : 'display: none;' }}">

            <div class="modal-content">

                {{-- Header --}}
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">
                        Review {{ $selectedCar?->name }}
                    </h2>

                    <button wire:click="closeReviewModal"
                        class="text-gray-400 text-2xl hover:text-yellow-500">
                        ×
                    </button>
                </div>

                {{-- Body --}}
                @if($selectedCar)
                    <form wire:submit.prevent="submitReview" class="space-y-6">

                        {{-- Stars --}}
                        <div>
                            <label class="block text-gray-400 font-semibold mb-2">
                                Rating
                            </label>

                            <div class="flex gap-2 text-3xl">
                                @for($i = 1; $i <= 5; $i++)
                                    <button type="button"
                                        wire:click="$set('rating', {{ $i }})"
                                        class="{{ $rating >= $i ? 'text-yellow-500' : 'text-gray-600' }}">
                                        ★
                                    </button>
                                @endfor
                            </div>

                            @error('rating')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Comment --}}
                        <div>
                            <label class="block text-gray-400 font-semibold mb-2">
                                Your Feedback
                            </label>

                            <textarea wire:model.defer="comment"
                                rows="4"
                                class="w-full px-3 py-2 rounded-lg text-white"
                                style="background: rgba(28,37,46,0.8); border:1px solid rgba(255,255,255,0.1);"
                                placeholder="Write your experience..."></textarea>

                            @error('comment')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Actions --}}
                        <div class="flex justify-end gap-4">
                            <button type="button"
                                wire:click="closeReviewModal"
                                class="btn-outline text-red-400">
                                Cancel
                            </button>

                            <button type="submit"
                                class="btn-primary text-yellow-500">
                                Submit Review
                            </button>
                        </div>

                    </form>
                @endif
            </div>
        </div>


    </div>
