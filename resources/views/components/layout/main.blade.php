<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Auto Heaven - Your Dream Ride, One Click Away</title>
        @vite(['resources/js/app.js','resources/css/main-layout.css'])
    </head>
    <body class="font-sans bg-[#1C252E] text-white overflow-x-hidden">
        <!-- Header/Navbar -->
        <x-header />
            {{ $slot }}
         <x-footer />
    </body>
</html>