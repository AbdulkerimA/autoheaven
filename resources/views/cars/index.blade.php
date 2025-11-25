<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Cars - Auto Heaven</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Inter:wght@300;400;500;600&amp;display=swap"
        rel="stylesheet">
    @vite(['resources/css/cars.css','resources/js/cars.js'])
</head>
@php
    $cars = [
        [
            'name'        => 'Toyota Corolla 2022',
            'brand'       => 'Toyota',
            'category'    => 'Sedan',
            'image'       => 'https://images.pexels.com/photos/358070/pexels-photo-358070.jpeg',
            'transmission'=> 'Automatic',
            'fuel'        => 'Petrol',
            'year'        => 2022,
            'mileage'     => '12,000 km',
            'rating'      => 4.5,
            'price'       => 45,
            'available'   => true,
        ]
    ];
@endphp
<body>
    <!-- Header -->
    <x-header class="bg-gray-900"/>
    <!-- Search Section -->
    <section class="pt-28 pb-8 w-full">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative lg:left-36">
            <div class="relative">
                <input type="text" id="search-input"
                    placeholder="Search cars by name, model, or brand..."
                    class="w-full px-6 py-4 pl-14 rounded-2xl bg-gray-800 border border-gray-700 text-white text-lg search-glow focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all">
                <svg class="absolute left-5 top-1/2 transform -translate-y-1/2 w-6 h-6 text-yellow-400" fill="none"
                    stroke="currentColor" viewbox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </section>
    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex gap-8"><!-- Mobile Sidebar Overlay -->
            <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"
                onclick="toggleMobileSidebar()"></div><!-- Mobile Sidebar -->
            <aside id="mobile-sidebar"
                class="mobile-sidebar fixed left-0 top-0 h-full w-80 z-50 lg:hidden sidebar-compact rounded-r-2xl shadow-2xl">
                <div class="p-6 h-full overflow-y-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-bold text-white">Filters</h2><button onclick="toggleMobileSidebar()"
                            class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg></button>
                    </div>
                    <div id="mobile-filters"><!-- Filters will be inserted here -->
                    </div>
                </div>
            </aside>
            <!-- Desktop Sidebar -->
            <aside class="desktop-sidebar w-80 sidebar-compact rounded-2xl shadow-xl p-6 h-fit sticky top-24">
                <h2 class="text-lg font-bold text-white mb-6">Filters</h2>
                <div id="desktop-filters">
                    <!-- Filters will be inserted here -->
                    <!-- Category -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-white mb-3">Category</label>
                        <select id="category-filter" class="filter-input w-full px-4 py-3 rounded-lg text-sm">
                        <option value="">All Categories</option>
                        <option value="suv">SUV</option>
                        <option value="sedan">Sedan</option>
                        <option value="convertible">Convertible</option>
                        <option value="sports">Sports</option>
                        <option value="luxury">Luxury</option>
                        </select>
                    </div>

                    <!-- Brand -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-white mb-3">Brand</label>
                        <select id="brand-filter" class="filter-input w-full px-4 py-3 rounded-lg text-sm">
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

                    <!-- Price Range -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-white mb-3">Price Range</label>
                        <div class="space-y-3">
                        <input type="range" id="price-range" min="50" max="500" value="500" class="price-range-slider w-full">
                        <div class="flex justify-between text-sm text-gray-400">
                            <span>$50</span>
                            <span id="price-display" class="text-yellow-400 font-semibold">Up to $500</span>
                            <span>$500</span>
                        </div>
                        </div>
                    </div>

                    <!-- Fuel Type -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-white mb-3">Fuel Type</label>
                        <div class="space-y-2">
                        <div class="flex items-center">
                            <input type="radio" id="fuel-all" name="fuel" value="" class="fuel-radio sr-only" checked>
                            <label for="fuel-all" class="flex-1 px-3 py-2 rounded-lg bg-gray-700 text-white text-sm text-center cursor-pointer transition">All</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="fuel-petrol" name="fuel" value="petrol" class="fuel-radio sr-only">
                            <label for="fuel-petrol" class="flex-1 px-3 py-2 rounded-lg bg-gray-700 text-white text-sm text-center cursor-pointer transition">Petrol</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="fuel-diesel" name="fuel" value="diesel" class="fuel-radio sr-only">
                            <label for="fuel-diesel" class="flex-1 px-3 py-2 rounded-lg bg-gray-700 text-white text-sm text-center cursor-pointer transition">Diesel</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="fuel-electric" name="fuel" value="electric" class="fuel-radio sr-only">
                            <label for="fuel-electric" class="flex-1 px-3 py-2 rounded-lg bg-gray-700 text-white text-center cursor-pointer transition">Electric</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="fuel-hybrid" name="fuel" value="hybrid" class="fuel-radio sr-only">
                            <label for="fuel-hybrid" class="flex-1 px-3 py-2 rounded-lg bg-gray-700 text-white text-sm text-center cursor-pointer transition">Hybrid</label>
                        </div>
                        </div>
                    </div>

                    <!-- Apply Button -->
                    <button id="apply-filters" class="btn-gold w-full px-6 py-3 rounded-lg text-sm font-semibold">
                        Apply Filters
                    </button>
                </div>
            </aside>
            <!-- Car Grid -->
            <div class="flex-1"><!-- Results Info -->
                <div class="flex justify-between items-center mb-6">
                    <p id="results-count" class="text-gray-400">Showing 9 cars</p><select id="sort-filter"
                        class="filter-input px-4 py-2 rounded-lg text-sm">
                        <option value="name">Sort by Name</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                        <option value="rating">Highest Rated</option>
                        <option value="year">Newest First</option>
                    </select>
                </div>
                <!-- Car Grid -->
                {{-- display cars --}}
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-12">
                    @foreach($cars as $car)
                        <x-car-card :car="$car" />
                    @endforeach
                </div>


                <!-- Pagination -->
                <div class="flex justify-center items-center space-x-2"><button
                        class="px-6 py-3 rounded-full bg-gray-800 hover:bg-gray-700 text-white transition disabled:opacity-50"
                        id="prev-page"> Previous </button>
                    <div id="page-numbers" class="flex space-x-2"><!-- Page numbers will be inserted here -->
                    </div><button
                        class="px-6 py-3 rounded-full bg-gray-800 hover:bg-gray-700 text-white transition disabled:opacity-50"
                        id="next-page"> Next </button>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <x-footer />

</html>