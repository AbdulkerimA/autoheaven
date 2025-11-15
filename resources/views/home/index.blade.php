<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Heaven - Your Dream Ride, One Click Away</title>
    @vite(['resources/js/app.js','resources/css/app.css'])
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Poppins', 'system-ui', 'sans-serif']
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'bounce-in': 'bounceIn 0.8s ease-out',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'float': 'float 3s ease-in-out infinite',
                        'scroll-indicator': 'scrollIndicator 2s ease-in-out infinite'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(40px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        bounceIn: {
                            '0%': { opacity: '0', transform: 'scale(0.3)' },
                            '50%': { transform: 'scale(1.05)' },
                            '100%': { opacity: '1', transform: 'scale(1)' }
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 20px rgba(245, 184, 0, 0.5)' },
                            '100%': { boxShadow: '0 0 30px rgba(245, 184, 0, 0.8)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        scrollIndicator: {
                            '0%, 100%': { transform: 'translateY(0px)', opacity: '1' },
                            '50%': { transform: 'translateY(10px)', opacity: '0.5' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            box-sizing: border-box;
        }
        
        .parallax-bg {
            background: linear-gradient(135deg, rgba(28, 37, 46, 0.8), rgba(28, 37, 46, 0.6)), 
                        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><defs><linearGradient id="carGrad" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:%23F5B800;stop-opacity:0.1"/><stop offset="100%" style="stop-color:%231C252E;stop-opacity:0.3"/></linearGradient></defs><rect width="1200" height="600" fill="url(%23carGrad)"/><circle cx="200" cy="150" r="3" fill="%23F5B800" opacity="0.6"><animate attributeName="opacity" values="0.6;1;0.6" dur="2s" repeatCount="indefinite"/></circle><circle cx="800" cy="100" r="2" fill="%23F5B800" opacity="0.4"><animate attributeName="opacity" values="0.4;0.8;0.4" dur="3s" repeatCount="indefinite"/></circle><circle cx="1000" cy="200" r="4" fill="%23F5B800" opacity="0.5"><animate attributeName="opacity" values="0.5;1;0.5" dur="2.5s" repeatCount="indefinite"/></circle></svg>');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #F5B800, #FFD700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(245, 184, 0, 0.2);
        }
        
        .navbar-scroll {
            transition: all 0.3s ease;
        }
        
        .scroll-reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
        }
        
        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }
        .btn-primary {
            background: linear-gradient(135deg, #facc15, #f59e0b);
            color: #111827;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(250, 204, 21, 0.4);
        }
        
        .btn-outline {
            border: 2px solid #facc15;
            color: #facc15;
            transition: all 0.3s ease;
        }
        
        .btn-outline:hover {
            background: #facc15;
            color: #111827;
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="font-sans bg-[#1C252E] text-white overflow-x-hidden">
    <!-- Header/Navbar -->
    <x-header />

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

    <!-- Footer -->
    <footer class="bg-[#1C252E] py-16 border-t border-[#F5B800]/20">
        <div class="max-w-7xl mx-auto px-8">
            <div class="grid md:grid-cols-3 gap-12 mb-12">
                <div class="scroll-reveal">
                    <h3 class="text-3xl font-bold gradient-text mb-6">Auto Heaven</h3>
                    <p class="text-gray-300 mb-6">Redefining luxury car rental with premium vehicles, exceptional service, and unmatched convenience.</p>
                    <div class="flex space-x-4">
                        <a href="#facebook" class="w-10 h-10 bg-[#F5B800]/20 rounded-full flex items-center justify-center hover:bg-[#F5B800] hover:scale-110 transition-all duration-300">
                            <span class="text-[#F5B800] hover:text-[#1C252E]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook-icon lucide-facebook">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                            </span>
                        </a>
                        <a href="#twitter" class="w-10 h-10 bg-[#F5B800]/20 rounded-full flex items-center justify-center hover:bg-[#F5B800] hover:scale-110 transition-all duration-300">
                            <span class="text-[#F5B800] hover:text-[#1C252E]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter-icon lucide-twitter"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                            </span>
                        </a>
                        <a href="#instagram" class="w-10 h-10 bg-[#F5B800]/20 rounded-full flex items-center justify-center hover:bg-[#F5B800] hover:scale-110 transition-all duration-300">
                            <span class="text-[#F5B800] hover:text-[#1C252E]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram-icon lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                            </span>
                        </a>
                    </div>
                </div>
                
                <div class="scroll-reveal">
                    <h4 class="font-bold text-xl mb-6 text-[#F5B800]">Quick Links</h4>
                    <ul class="space-y-3 text-gray-300">
                        <li><a href="#home" class="hover:text-[#F5B800] transition-colors duration-300">Home</a></li>
                        <li><a href="#cars" class="hover:text-[#F5B800] transition-colors duration-300">Cars</a></li>
                        <li><a href="#how-it-works" class="hover:text-[#F5B800] transition-colors duration-300">How It Works</a></li>
                        <li><a href="#about" class="hover:text-[#F5B800] transition-colors duration-300">About Us</a></li>
                        <li><a href="#contact" class="hover:text-[#F5B800] transition-colors duration-300">Contact</a></li>
                        <li><a href="#support" class="hover:text-[#F5B800] transition-colors duration-300">Support</a></li>
                    </ul>
                </div>
                
                <div class="scroll-reveal">
                    <h4 class="font-bold text-xl mb-6 text-[#F5B800]">Legal</h4>
                    <ul class="space-y-3 text-gray-300">
                        <li><a href="#privacy" class="hover:text-[#F5B800] transition-colors duration-300">Privacy Policy</a></li>
                        <li><a href="#terms" class="hover:text-[#F5B800] transition-colors duration-300">Terms of Service</a></li>
                        <li><a href="#cookies" class="hover:text-[#F5B800] transition-colors duration-300">Cookie Policy</a></li>
                        <li><a href="#safety" class="hover:text-[#F5B800] transition-colors duration-300">Safety Guidelines</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-[#F5B800]/20 pt-8 text-center scroll-reveal">
                <p class="text-gray-300">&copy; 2025 Auto Heaven. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('glass-effect');
                navbar.style.backgroundColor = 'rgba(28, 37, 46, 0.9)';
            } else {
                navbar.classList.remove('glass-effect');
                navbar.style.backgroundColor = 'transparent';
            }
        });

        // Scroll reveal animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.scroll-reveal').forEach(el => {
            observer.observe(el);
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Search form functionality
        // document.querySelector('form').addEventListener('submit', function(e) {
        //     e.preventDefault();
        //     const location = document.getElementById('location').value;
        //     const pickupDate = document.getElementById('pickup-date').value;
        //     const returnDate = document.getElementById('return-date').value;
            
        //     if (location && pickupDate && returnDate) {
        //         // Create custom modal instead of alert
        //         const modal = document.createElement('div');
        //         modal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50';
        //         modal.innerHTML = `
        //             <div class="bg-primary p-8 rounded-2xl shadow-2xl max-w-md mx-4 glass-effect animate-bounce-in">
        //                 <h3 class="text-2xl font-bold text-[#F5B800] mb-4">Search Results</h3>
        //                 <p class="text-white mb-6">Searching for cars in ${location} from ${pickupDate} to ${returnDate}</p>
        //                 <button onclick="this.parentElement.parentElement.remove()" class="bg-[#F5B800] text-primary font-bold px-6 py-3 rounded-xl hover:bg-yellow-400 transition-all duration-300">
        //                     Close
        //                 </button>
        //             </div>
        //         `;
        //         document.body.appendChild(modal);
        //     } else {
        //         const modal = document.createElement('div');
        //         modal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50';
        //         modal.innerHTML = `
        //             <div class="bg-primary p-8 rounded-2xl shadow-2xl max-w-md mx-4 glass-effect animate-bounce-in">
        //                 <h3 class="text-2xl font-bold text-red-400 mb-4">Missing Information</h3>
        //                 <p class="text-white mb-6">Please fill in all search fields</p>
        //                 <button onclick="this.parentElement.parentElement.remove()" class="bg-[#F5B800] text-primary font-bold px-6 py-3 rounded-xl hover:bg-yellow-400 transition-all duration-300">
        //                     Close
        //                 </button>
        //             </div>
        //         `;
        //         document.body.appendChild(modal);
        //     }
        // });

        // Book Now button functionality
        document.querySelectorAll('button').forEach(button => {
            if (button.textContent.includes('Book Now')) {
                button.addEventListener('click', function() {
                    const carName = this.closest('.card-hover').querySelector('h3').textContent;
                    const modal = document.createElement('div');
                    modal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50';
                    modal.innerHTML = `
                        <div class="bg-primary p-8 rounded-2xl shadow-2xl max-w-md mx-4 glass-effect animate-bounce-in">
                            <h3 class="text-2xl font-bold text-[#F5B800] mb-4">Booking ${carName}</h3>
                            <p class="text-white mb-6">Redirecting to booking page...</p>
                            <button onclick="this.parentElement.parentElement.remove()" class="bg-[#F5B800] text-primary font-bold px-6 py-3 rounded-xl hover:bg-yellow-400 transition-all duration-300">
                                Close
                            </button>
                        </div>
                    `;
                    document.body.appendChild(modal);
                });
            }
        });

        // Other button functionality
        document.querySelectorAll('button').forEach(button => {
            if (button.textContent.includes('Rent Now')) {
                button.addEventListener('click', function() {
                    document.querySelector('#home').scrollIntoView({ behavior: 'smooth' });
                });
            }
            if (button.textContent.includes('Become an Owner')) {
                button.addEventListener('click', function() {
                    const modal = document.createElement('div');
                    modal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50';
                    modal.innerHTML = `
                        <div class="bg-primary p-8 rounded-2xl shadow-2xl max-w-md mx-4 glass-effect animate-bounce-in">
                            <h3 class="text-2xl font-bold text-[#F5B800] mb-4">Become an Owner</h3>
                            <p class="text-white mb-6">Redirecting to car owner registration...</p>
                            <button onclick="this.parentElement.parentElement.remove()" class="bg-[#F5B800] text-primary font-bold px-6 py-3 rounded-xl hover:bg-yellow-400 transition-all duration-300">
                                Close
                            </button>
                        </div>
                    `;
                    document.body.appendChild(modal);
                });
            }
        });

        // Add parallax effect to hero background
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.parallax-bg');
            const speed = scrolled * 0.5;
            parallax.style.transform = `translateY(${speed}px)`;
        });
    </script>
</body>
</html>
