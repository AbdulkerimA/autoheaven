<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Browse Cars - Auto Heaven</title>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Inter:wght@300;400;500;600&amp;display=swap"
            rel="stylesheet">
        @vite(['resources/css/cars.css'])
        @livewireStyles
    </head>
    <body>
        <!-- Header -->
        <x-header class="bg-gray-900"/>
        <!-- Search Section -->
        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-2 py-8 pt-36">
            <div class="flex gap-8 px-0"><!-- Mobile Sidebar Overlay -->
                <livewire:car-filter />
            </div>
        </main>
        <!-- Footer -->
        <x-footer />
        @livewireScripts
    </body>
</html>