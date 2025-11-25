<header id="navbar" {{ $attributes->merge(['class'=>"fixed top-0 w-full z-50 navbar-scroll"]) }}>
    <nav class="max-w-7xl mx-auto px-8 py-4 flex items-center justify-between">
        <div class="flex items-center animate-fade-in">
            <h1 class="text-3xl font-bold gradient-text">Auto Heaven</h1>
        </div>
        <div class="hidden md:flex items-center space-x-8 animate-fade-in">
            <a href="#home" class="text-white hover:text-[#F5B800] transition-all duration-300 hover:scale-105">Home</a>
            <a href="/cars" class="text-white hover:text-[#F5B800] transition-all duration-300 hover:scale-105">Cars</a>
            <a href="#how-it-works" class="text-white hover:text-[#F5B800] transition-all duration-300 hover:scale-105">How It Works</a>
            <a href="/about" class="text-white hover:text-[#F5B800] transition-all duration-300 hover:scale-105">About</a>
            <a href="#contact" class="text-white hover:text-[#F5B800] transition-all duration-300 hover:scale-105">Contact</a>
            @guest
                <a href="/login" class="text-white hover:text-[#F5B800] transition-all duration-300 hover:scale-105">Login</a>
                <a href="/register" class="text-white hover:text-[#F5B800] transition-all duration-300 hover:scale-105">Sign Up</a>
            @endguest
        </div>
        {{-- if the user is loged in display the following --}}
        @auth
            <div class="relative hidden md:block">
                <button class="flex items-center space-x-3 text-gray-300 hover:text-[#F5B800]" id="profileBtn">
                    <div class="w-10 h-10 bg-gradient-to-br bg-[#F5B800] to-yellow-600 rounded-full flex items-center justify-center text-[#12181f] font-bold">
                        <img src="" alt="">
                    </div>
                    <div class="hidden md:block text-left">
                        <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-yellow-400">welcome</p>
                    </div>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <!-- Profile Dropdown -->
                <div class="dropdown absolute right-0 mt-2 w-56 rounded-xl shadow-2xl hidden bg-[#1a1f27]" id="profileDropdown">
                    <div class="p-2">
                        {{-- <div class="px-4 py-3 border-b border-gray-600">
                            <p class="font-semibold">Sara Tadesse</p>
                            <p class="text-sm text-gray-400">sara.tadesse@propertyhub.com</p>
                        </div> --}}
                        <a href="/profile/{{ Auth::user()->name }}" class="block px-4 py-3 text-sm hover:bg-white/10 rounded-lg mt-2 text-yellow-400">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            View Profile
                        </a>
                        <a href="/settings/{{ Auth::user()->name }}" class="block px-4 py-3 text-sm hover:bg-white/10 rounded-lg text-yellow-400">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Account Settings
                        </a>
                        <a href="/support" class="block px-4 py-3 text-sm hover:bg-white/10 rounded-lg text-yellow-400">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Help & Support
                        </a>
                        <hr class="my-2 border-gray-600">
                        <button 
                            type="logout" 
                            form="logoutForm" 
                            class="w-full block px-1 py-3 text-sm text-red-400 hover:bg-red-400/10 rounded-lg">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Sign Out
                        </button>
                        <form action="/logout" method="post" class="hidden" id="logoutForm">
                            @csrf
                            {{-- @method('DELETE') --}}
                        </form>
                    </div>
                </div>
            </div>
        @endauth

        @guest
            <button class="bg-[#F5B800] text-[#1C252E] font-semibold px-6 py-3 rounded-xl hover:scale-105 transition-all duration-300 animate-glow animate-fade-in">
                Rent Now
            </button>
        @endguest
    </nav>
</header>