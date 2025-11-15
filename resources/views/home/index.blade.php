<x-layout.main>
    @vite(['resources/js/home'])
    <main>
        <!-- Hero Section -->
        <section id="home" class="min-h-full parallax-bg flex items-center justify-center relative">
            <div class="max-w-7xl mx-auto px-8 py-32 text-center">
                <h1 class="text-6xl md:text-7xl font-bold mb-6 animate-fade-in">
                    Your Dream Ride, <span class="gradient-text">One Click Away</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-12 animate-slide-up max-w-3xl mx-auto">
                    Find, book, and drive premium cars easily with Auto Heaven
                </p>

                {{-- cta --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-up mt-4 mb-8" style="animation-delay: 0.2s;">
                    <button class="btn-primary font-bold px-10 py-4 rounded-xl text-lg shadow-md">
                        Rent a Car
                    </button>
                    <button class="btn-outline bg-white/10 backdrop-blur-sm font-bold px-10 py-4 rounded-xl text-lg border-white/30 text-white hover:bg-[#F59E0B] hover:text-primary">
                        List Your Car
                    </button>
                </div>

                <!-- Animated Search Bar -->
                <div class="glass-effect p-8 rounded-2xl shadow-2xl max-w-4xl mx-auto animate-bounce-in">
                    <form class="grid md:grid-cols-4 gap-4">
                        <div class="group">
                            <label for="location" class="block text-sm font-medium text-gray-300 mb-2">pick up Location</label>
                            <input type="text" id="location" placeholder="from Where ?" class="w-full p-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:ring-2 focus:ring-[#F5B800] focus:border-transparent transition-all duration-300 group-hover:bg-white/20">
                        </div>
                        <div class="group">
                            <label for="pickup-date" class="block text-sm font-medium text-gray-300 mb-2">Pickup Date</label>
                            <input type="date" id="pickup-date" class="w-full p-4 bg-white/10 border border-white/20 rounded-xl text-white focus:ring-2 focus:ring-[#F5B800] focus:border-transparent transition-all duration-300 group-hover:bg-white/20">
                        </div>
                        <div class="group">
                            <label for="return-date" class="block text-sm font-medium text-gray-300 mb-2">Return Date</label>
                            <input type="date" id="return-date" class="w-full p-4 bg-white/10 border border-white/20 rounded-xl text-white focus:ring-2 focus:ring-[#F5B800] focus:border-transparent transition-all duration-300 group-hover:bg-white/20">
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="w-full bg-[#F5B800] text-[#1C252E] font-bold p-4 rounded-xl hover:scale-105 hover:bg-yellow-400 transition-all duration-300 animate-glow">
                                Search Cars
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Scroll Indicator -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-scroll-indicator flex flex-col items-center">
                <div class="w-6 h-10 border-2 border-[#F5B800] rounded-full flex justify-center">
                    <div class="w-1 h-3 bg-[#F5B800] rounded-full mt-2 animate-float"></div>
                </div>
                <p class="text-[#F5B800] text-sm mt-2">Scroll Down</p>
            </div>
        </section>

        <!-- How It Works Section -->
        <section id="how-it-works" class="py-20 bg-gradient-to-b from-[#1C252E] to-gray-900 scroll-reveal">
            <div class="max-w-7xl mx-auto px-8">
                <div class="text-center mb-16 scroll-reveal">
                    <h2 class="text-5xl font-bold mb-4">How It <span class="gradient-text">Works</span></h2>
                    <p class="text-xl text-gray-300">Get on the road in just 3 simple steps</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="card-hover bg-white/5 p-8 rounded-2xl shadow-lg text-center glass-effect scroll-reveal">
                        <div class="w-20 h-20 bg-gradient-to-br from-[#F5B800] to-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce-in">
                            <svg class="w-10 h-10 text-[#1C252E]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Browse Cars</h3>
                        <p class="text-gray-300">Explore our premium collection of verified vehicles from luxury to economy.</p>
                    </div>
                    
                    <div class="card-hover bg-white/5 p-8 rounded-2xl shadow-lg text-center glass-effect scroll-reveal">
                        <div class="w-20 h-20 bg-gradient-to-br from-[#F5B800] to-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce-in">
                            <svg class="w-10 h-10 text-[#1C252E]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Book & Pay</h3>
                        <p class="text-gray-300">Secure booking with instant confirmation and flexible payment options.</p>
                    </div>
                    
                    <div class="card-hover bg-white/5 p-8 rounded-2xl shadow-lg text-center glass-effect scroll-reveal">
                        <div class="w-20 h-20 bg-gradient-to-br from-[#F5B800] to-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce-in">
                            <svg class="w-10 h-10 text-[#1C252E]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Drive & Enjoy</h3>
                        <p class="text-gray-300">Pick up your car and hit the road. Experience luxury at your fingertips.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Collections Section -->
        <section id="cars" class="py-32 bg-cream">
            <div class="max-w-7xl mx-auto px-8">
                <div class="text-center mb-20 scroll-reveal">
                    <h2 class="text-5xl lg:text-6xl font-black mb-8">Featured <span class="gradient-text">Collections</span></h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Curated vehicles for every lifestyle and adventure
                    </p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="card-interactive group relative h-80 rounded-3xl overflow-hidden shadow-xl scroll-reveal">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#F59E0B]/80 to-[#F59E0B]-warm/60"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <img src="{{ asset('storage/cars/suv2.jpg') }}" alt="suv" class="h-full w-full object-cover">
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/80 to-transparent">
                            <h3 class="text-2xl font-bold text-white mb-2">Luxury</h3>
                            <p class="text-white/80">Premium vehicles for special occasions</p>
                        </div>
                    </div>
                    
                    <div class="card-interactive group relative h-80 rounded-3xl overflow-hidden shadow-xl scroll-reveal" style="animation-delay: 0.1s;">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/80 to-blue-600/60"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <img src="{{ asset('storage/cars/volkswagen.jpg') }}" alt="suv" class="h-full w-full object-cover">
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/80 to-transparent">
                            <h3 class="text-2xl font-bold text-white mb-2">Family</h3>
                            <p class="text-white/80">Spacious and safe for family trips</p>
                        </div>
                    </div>
                    
                    <div class="card-interactive group relative h-80 rounded-3xl overflow-hidden shadow-xl scroll-reveal" style="animation-delay: 0.2s;">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-500/80 to-green-600/60"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <img src="{{ asset('storage/cars/bmw-m4-gtr.jpg') }}" alt="fun car">
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/80 to-transparent">
                            <h3 class="text-2xl font-bold text-white mb-2">Adventure</h3>
                            <p class="text-white/80">Rugged vehicles for outdoor exploration</p>
                        </div>
                    </div>
                    
                    <div class="card-interactive group relative h-80 rounded-3xl overflow-hidden shadow-xl scroll-reveal" style="animation-delay: 0.3s;">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/80 to-purple-600/60"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <img src="{{ asset('storage/cars/bmw.jpg') }}" alt="suv" class="h-full w-full object-cover">
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/80 to-transparent">
                            <h3 class="text-2xl font-bold text-white mb-2">Daily Drive</h3>
                            <p class="text-white/80">Reliable cars for everyday needs</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Cars Section -->
        <section id="cars" class="py-16 bg-cream">
            <div class="max-w-7xl mx-auto px-10">
                <div class="text-center mb-16 scroll-reveal">
                    <h2 class="text-4xl md:text-5xl font-heading font-bold mb-4 text-primary">Featured Cars</h2>
                    <p class="text-xl text-[#374151] max-w-2xl mx-auto font-body">
                        Discover our most popular vehicles for your next adventure
                    </p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Car 1 -->
                    <div class="card-hover bg-[#111827] rounded-xl overflow-hidden shadow-md scroll-reveal group">
                        <div class="h-48 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center relative">
                            <div class="text-6xl">
                                <img src="{{ asset('storage/cars/bmw-2.jpg') }}" alt="a car" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <button class="btn-primary font-bold px-4 py-2 rounded-xl transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    Book Now
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-heading font-bold mb-2 text-primary">bmw </h3>
                            <p class="text-[#374151] text-sm mb-4 font-body">Electric • Luxury • 5 seats</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-[#facc15]">890 ETB<span class="text-sm text-gray-500">/day</span></span>
                                <div class="flex text-[#facc15] text-sm">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Car 2 -->
                    <div class="card-hover bg-[#111827] rounded-xl overflow-hidden shadow-md scroll-reveal group" style="animation-delay: 0.1s;">
                        <div class="h-48 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center relative">
                            <div class="text-6xl">
                                <img src="{{ asset('storage/cars/suv1.jpg') }}" alt="a car" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <button class="btn-primary font-bold px-4 py-2 rounded-xl transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    Book Now
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-heading font-bold mb-2 text-primary">mercedes benz</h3>
                            <p class="text-[#374151] text-sm mb-4 font-body">SUV • Premium • 7 seats</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-[#facc15]">1,250 ETb<span class="text-sm text-gray-500">/day</span></span>
                                <div class="flex text-[#facc15] text-sm">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Car 3 -->
                    <div class="card-hover bg-[#111827] rounded-xl overflow-hidden shadow-md scroll-reveal group" style="animation-delay: 0.2s;">
                        <div class="h-48 bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center relative">
                            <div class="text-6xl">
                                <img src="{{ asset('storage/cars/suv2.jpg') }}" alt="suv car">
                            </div>
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <button class="btn-primary font-bold px-4 py-2 rounded-xl transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    Book Now
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-heading font-bold mb-2 text-primary">Range rover</h3>
                            <p class="text-[#374151] text-sm mb-4 font-body">Compact • Economy • 5 seats</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-[#facc15]">4,500 ETB<span class="text-sm text-gray-500">/day</span></span>
                                <div class="flex text-[#facc15] text-sm">
                                    ★★★★☆
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Car 4 -->
                    <div class="card-hover bg-[#111827] rounded-xl overflow-hidden shadow-md scroll-reveal group" style="animation-delay: 0.3s;">
                        <div class="h-48 bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center relative">
                            <div class="text-6xl">
                                <img src="{{ asset('storage/cars/porch-911-gt3.jpg') }}" alt="suv car">
                            </div>
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <button class="btn-primary font-bold px-4 py-2 rounded-xl transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    Book Now
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-heading font-bold mb-2 text-primary">Porsche 911 gtr3</h3>
                            <p class="text-[#374151] text-sm mb-4 font-body">Sports • Luxury • 2 seats</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-[#facc15]">20,999 ETB<span class="text-sm text-gray-500">/day</span></span>
                                <div class="flex text-[#facc15] text-sm">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Auto Heaven Section -->
        <section class="py-20 bg-gradient-to-b from-[#1C252E] to-gray-900">
            <div class="max-w-7xl mx-auto px-8">
                <div class="text-center mb-16 scroll-reveal">
                    <h2 class="text-5xl font-bold mb-4">Why Choose <span class="gradient-text">Auto Heaven</span></h2>
                    <p class="text-xl text-gray-300">Experience luxury with complete peace of mind</p>
                </div>
                
                <div class="grid md:grid-cols-4 gap-8">
                    <div class="card-hover text-center scroll-reveal">
                        <div class="w-20 h-20 bg-gradient-to-br from-[#F5B800] to-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce-in">
                            <svg class="w-10 h-10 text-[#1C252E]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Secure Payments</h3>
                        <p class="text-gray-300">Bank-level security for all transactions</p>
                    </div>
                    
                    <div class="card-hover text-center scroll-reveal">
                        <div class="w-20 h-20 bg-gradient-to-br from-[#F5B800] to-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce-in">
                            <svg class="w-10 h-10 text-[#1C252E]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Verified Owners</h3>
                        <p class="text-gray-300">All vehicles thoroughly inspected and verified</p>
                    </div>
                    
                    <div class="card-hover text-center scroll-reveal">
                        <div class="w-20 h-20 bg-gradient-to-br from-[#F5B800] to-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce-in">
                            <svg class="w-10 h-10 text-[#1C252E]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4">24/7 Support</h3>
                        <p class="text-gray-300">Round-the-clock assistance whenever you need</p>
                    </div>
                    
                    <div class="card-hover text-center scroll-reveal">
                        <div class="w-20 h-20 bg-gradient-to-br from-[#F5B800] to-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce-in">
                            <svg class="w-10 h-10 text-[#1C252E]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1H5C3.9 1 3 1.9 3 3V21C3 22.1 3.9 23 5 23H19C20.1 23 21 22.1 21 21V9M19 9H14V4H19V9Z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Affordable Luxury</h3>
                        <p class="text-gray-300">Premium cars at competitive prices</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-20 bg-gradient-to-b from-gray-900 to-[#1C252E]">
            <div class="max-w-7xl mx-auto px-8">
                <div class="text-center mb-16 scroll-reveal">
                    <h2 class="text-5xl font-bold mb-4">What Our <span class="gradient-text">Customers</span> Say</h2>
                    <p class="text-xl text-gray-300">Real experiences from real customers</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="card-hover bg-white/5 p-8 rounded-2xl shadow-lg glass-effect scroll-reveal">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-[#F5B800] to-yellow-400 rounded-full flex items-center justify-center mr-4">
                                <span class="text-[#1C252E] font-bold text-lg">AS</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Alex Smith</h4>
                                <div class="flex text-[#F5B800] text-lg">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-300">"Incredible service! The Tesla Model S was pristine and the booking process was seamless. Auto Heaven exceeded all my expectations."</p>
                    </div>
                    
                    <div class="card-hover bg-white/5 p-8 rounded-2xl shadow-lg glass-effect scroll-reveal">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-[#F5B800] to-yellow-400 rounded-full flex items-center justify-center mr-4">
                                <span class="text-[#1C252E] font-bold text-lg">MR</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Maria Rodriguez</h4>
                                <div class="flex text-[#F5B800] text-lg">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-300">"The BMW X7 was perfect for our family vacation. Clean, comfortable, and the customer service was outstanding throughout our trip."</p>
                    </div>
                    
                    <div class="card-hover bg-white/5 p-8 rounded-2xl shadow-lg glass-effect scroll-reveal">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-[#F5B800] to-yellow-400 rounded-full flex items-center justify-center mr-4">
                                <span class="text-[#1C252E] font-bold text-lg">JD</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">James Davis</h4>
                                <div class="flex text-[#F5B800] text-lg">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-300">"Driving the Porsche 911 was a dream come true! Auto Heaven made luxury accessible and the entire experience was flawless."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call-to-Action Banner -->
        <section class="py-20 bg-gradient-to-r from-[#1C252E] via-[#F5B800]/20 to-[#1C252E]">
            <div class="max-w-7xl mx-auto px-8 text-center scroll-reveal">
                <h2 class="text-5xl font-bold mb-6">List Your Car on <span class="gradient-text">Auto Heaven</span> & Start Earning Today!</h2>
                <p class="text-xl text-gray-300 mb-8 max-w-3xl mx-auto">Join thousands of car owners who are earning extra income by sharing their vehicles with our premium community.</p>
                <button class="bg-[#F5B800] text-[#1C252E] font-bold px-12 py-4 rounded-xl hover:scale-105 hover:bg-yellow-400 transition-all duration-300 text-xl animate-glow">
                    Become an Owner
                </button>
            </div>
        </section>
    </main>
</x-layout.main>

{{-- script --}}

