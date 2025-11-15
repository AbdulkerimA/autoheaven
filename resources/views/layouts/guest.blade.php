<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/login.css', 'resources/js/app.js'])
    </head>
    <body class="flex items-center" 
        style="font-family: Inter, system-ui, sans-serif; background-color: var(--color-dark-bg); color: var(--color-dark-text);">
        <!-- Left Section - Hero -->
        <div class="hidden lg:flex lg:w-1/3 relative overflow-hidden">
            <div class="hero-bg absolute inset-0"></div>
            <div
            class="relative z-10 flex flex-col justify-center items-center text-center px-12 text-white"
            >
            <!-- Logo -->
            <div class="flex items-center space-x-4 mb-8 animate-fade-up hover:cursor-pointer" onclick="window.location = '/'">
                <div
                class="w-12 h-12 bg-gradient-to-br from-accent to-warm-amber rounded-xl flex items-center justify-center"
                >
                <svg
                    class="w-7 h-7 text-primary"
                    fill="currentColor"
                    viewbox="0 0 24 24"
                >
                    <path
                    d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z"
                    />
                </svg>
                </div>
                <h1
                class="text-3xl font-bold"
                style="font-family: Poppins, system-ui, sans-serif"
                >
                Auto Heaven
                </h1>
            </div>
            <!-- Tagline -->
            <div class="animate-fade-up" style="animation-delay: 0.2s">
                <h2
                class="text-3xl md:text-5xl font-bold mb-6 leading-tight"
                style="font-family: Poppins, system-ui, sans-serif"
                >
                Your Dream Ride, <br /><span
                    style="
                    background: linear-gradient(
                        to right,
                        var(--color-accent),
                        var(--color-warm-amber)
                    );
                    -webkit-background-clip: text;
                    background-clip: text;
                    color: transparent;
                    "
                    > One Click Away.</span
                >
                </h2>
                <p
                class="text-xl max-w-md mx-auto"
                style="
                    color: rgba(255, 255, 255, 0.8);
                    font-family: Inter, system-ui, sans-serif;
                "
                >
                Find, book, and drive premium cars easily with Auto Heaven.
                </p>
            </div>
            </div>
        </div>
        <!-- Right Section - Login Form -->
        <div class="w-full sm:block lg:w-1/2 lg:flex items-center p-8 lg:p-12 px-0 ">
            <!-- Mobile Logo (visible on small screens) -->
            <div class="lg:hidden flex items-center justify-center space-x-3 mb-8 animate-fade-up">
                <div class="w-10 h-10 bg-gradient-to-br from-accent to-warm-amber rounded-xl flex items-center justify-center">
                <svg
                    class="w-6 h-6 text-primary"
                    fill="currentColor"
                    viewbox="0 0 24 24"
                >
                    <path
                    d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z"
                    />
                </svg>
                </div>
                <h1
                class="text-2xl font-bold"
                style="
                    font-family: Poppins, system-ui, sans-serif;
                    color: var(--color-dark-text);
                "
                >
                Auto Heaven
                </h1>
            </div>

            <div class="w-full p-8 lg:p-12">
                {{-- logo --}}
                {{-- <div>
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </div> --}}

                <div class="login-card golden-glow p-8 rounded-xl animate-fade-up">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
