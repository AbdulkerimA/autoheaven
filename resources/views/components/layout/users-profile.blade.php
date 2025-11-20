<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Heaven - Customer Profile</title>
    
</head>

<body
    style="font-family: Inter, system-ui, sans-serif; background-color: var(--color-dark-bg); color: var(--color-dark-text); min-height: 100%;">
    <!-- Header -->
    <header class="sticky top-0 z-50"
        style="background: rgba(17, 24, 39, 0.95); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(250, 204, 21, 0.2);">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between"><!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-accent to-warm-amber rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewbox="0 0 24 24">
                            <path
                                d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z" />
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold"
                        style="font-family: Poppins, system-ui, sans-serif; color: var(--color-dark-text);">Auto Heaven
                    </h1>
                </div><!-- Navigation -->
                <nav class="hidden md:flex items-center space-x-8"><a href="#home"
                        class="transition-colors duration-300"
                        style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;"
                        onmouseover="this.style.color='var(--color-accent)'"
                        onmouseout="this.style.color='var(--color-gray)'">Home</a> <a href="#browse"
                        class="transition-colors duration-300"
                        style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;"
                        onmouseover="this.style.color='var(--color-accent)'"
                        onmouseout="this.style.color='var(--color-gray)'">Browse Cars</a> <a href="#bookings"
                        class="transition-colors duration-300"
                        style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;"
                        onmouseover="this.style.color='var(--color-accent)'"
                        onmouseout="this.style.color='var(--color-gray)'">My Bookings</a>
                </nav><!-- Profile Dropdown -->
                <div class="relative"><button id="profileDropdown"
                        class="flex items-center space-x-3 p-2 rounded-xl transition-all duration-300"
                        style="background: rgba(250, 204, 21, 0.1);"
                        onmouseover="this.style.background='rgba(250, 204, 21, 0.2)'"
                        onmouseout="this.style.background='rgba(250, 204, 21, 0.1)'"> <img
                            src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 40'><rect width='40' height='40' fill='%23374151'/><circle cx='20' cy='15' r='8' fill='%23facc15'/><path d='M5 35 Q5 25 15 25 h10 Q35 25 35 35' fill='%23facc15'/></svg>"
                            alt="Profile" class="w-8 h-8 rounded-full"> <span
                            class="hidden md:block text-sm font-medium"
                            style="color: var(--color-dark-text); font-family: Inter, system-ui, sans-serif;">John
                            Smith</span>
                        <svg class="w-4 h-4" style="color: var(--color-accent);" fill="currentColor"
                            viewbox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg></button>
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 dropdown-menu rounded-xl py-2 z-50">
                        <a href="#profile" class="block px-4 py-2 text-sm transition-colors duration-300"
                            style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;"
                            onmouseover="this.style.color='var(--color-accent)'; this.style.background='rgba(250, 204, 21, 0.1)'"
                            onmouseout="this.style.color='var(--color-gray)'; this.style.background='transparent'">View
                            Profile</a> <a href="#settings"
                            class="block px-4 py-2 text-sm transition-colors duration-300"
                            style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;"
                            onmouseover="this.style.color='var(--color-accent)'; this.style.background='rgba(250, 204, 21, 0.1)'"
                            onmouseout="this.style.color='var(--color-gray)'; this.style.background='transparent'">Settings</a>
                        <hr style="border-color: rgba(250, 204, 21, 0.2); margin: 8px 0;"><a href="#logout"
                            class="block px-4 py-2 text-sm transition-colors duration-300"
                            style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;"
                            onmouseover="this.style.color='#ef4444'; this.style.background='rgba(239, 68, 68, 0.1)'"
                            onmouseout="this.style.color='var(--color-gray)'; this.style.background='transparent'">Sign
                            Out</a>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-8"><!-- Profile Overview Section -->
        <section class="profile-banner rounded-2xl p-8 mb-8 animate-fade-up">
            <div class="flex flex-col lg:flex-row items-center lg:items-start space-y-6 lg:space-y-0 lg:space-x-8">
                <!-- Profile Photo -->
                <div class="relative golden-glow"><img id="profileImage"
                        src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 120 120'><rect width='120' height='120' fill='%23374151'/><circle cx='60' cy='45' r='20' fill='%23facc15'/><path d='M20 100 Q20 80 40 80 h40 Q100 80 100 100' fill='%23facc15'/></svg>"
                        alt="Profile Photo" class="profile-photo"> <button id="photoUploadBtn"
                        class="absolute bottom-0 right-0 bg-accent hover:bg-warm-amber text-primary p-2 rounded-full transition-all duration-300 transform hover:scale-110">
                        <svg class="w-4 h-4" fill="currentColor" viewbox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                clip-rule="evenodd" />
                        </svg></button> <input type="file" id="photoInput" accept="image/*" class="hidden">
                </div><!-- Profile Info -->
                <div class="flex-1 text-center lg:text-left">
                    <h2 class="text-3xl lg:text-4xl font-bold mb-2"
                        style="font-family: Poppins, system-ui, sans-serif; color: var(--color-dark-text);">John Smith
                    </h2>
                    <p class="text-lg mb-4"
                        style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">@johnsmith •
                        john.smith@email.com</p><!-- Badges -->
                    <div class="flex flex-wrap justify-center lg:justify-start items-center space-x-4 mb-6">
                        <div class="flex items-center space-x-2 px-3 py-1 rounded-full"
                            style="background: rgba(250, 204, 21, 0.2);">
                            <svg class="w-4 h-4" style="color: var(--color-accent);" fill="currentColor"
                                viewbox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg><span class="text-sm font-medium"
                                style="color: var(--color-accent); font-family: Inter, system-ui, sans-serif;">Premium
                                Member</span>
                        </div>
                        <div class="flex items-center space-x-2 px-3 py-1 rounded-full"
                            style="background: rgba(34, 197, 94, 0.2);">
                            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewbox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg><span class="text-sm font-medium text-green-400"
                                style="font-family: Inter, system-ui, sans-serif;">Verified</span>
                        </div><span class="text-sm"
                            style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Joined March
                            2023</span>
                    </div><!-- Edit Profile Button --> <button id="editProfileBtn"
                        class="btn-primary px-6 py-3 rounded-xl font-bold"
                        style="font-family: Poppins, system-ui, sans-serif;"> Edit Profile </button>
                </div>
            </div>
        </section><!-- Profile Details Section -->
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8"><!-- Personal Information Card -->
            <div class="info-card p-6 rounded-xl animate-fade-up" style="animation-delay: 0.1s;">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold"
                        style="font-family: Poppins, system-ui, sans-serif; color: var(--color-dark-text);">Personal
                        Information</h3><button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium"
                        style="font-family: Inter, system-ui, sans-serif;"> Edit Details </button>
                </div>
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div><label class="block text-sm font-medium mb-1"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Full
                                Name</label>
                            <p class="text-sm"
                                style="color: var(--color-dark-text); font-family: Inter, system-ui, sans-serif;">John
                                Smith</p>
                        </div>
                        <div><label class="block text-sm font-medium mb-1"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Email</label>
                            <p class="text-sm"
                                style="color: var(--color-dark-text); font-family: Inter, system-ui, sans-serif;">
                                john.smith@email.com</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><label class="block text-sm font-medium mb-1"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Phone</label>
                            <p class="text-sm"
                                style="color: var(--color-dark-text); font-family: Inter, system-ui, sans-serif;">+1
                                (555) 123-4567</p>
                        </div>
                        <div><label class="block text-sm font-medium mb-1"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Date of
                                Birth</label>
                            <p class="text-sm"
                                style="color: var(--color-dark-text); font-family: Inter, system-ui, sans-serif;">March
                                15, 1990</p>
                        </div>
                    </div>
                    <div><label class="block text-sm font-medium mb-1"
                            style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Address</label>
                        <p class="text-sm"
                            style="color: var(--color-dark-text); font-family: Inter, system-ui, sans-serif;">123 Main
                            Street, Apt 4B<br>
                            New York, NY 10001</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><label class="block text-sm font-medium mb-1"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Gender</label>
                            <p class="text-sm"
                                style="color: var(--color-dark-text); font-family: Inter, system-ui, sans-serif;">Male
                            </p>
                        </div>
                        <div><label class="block text-sm font-medium mb-1"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Driver's
                                License</label>
                            <p class="text-sm"
                                style="color: var(--color-dark-text); font-family: Inter, system-ui, sans-serif;">
                                D123456789</p>
                        </div>
                    </div>
                </div>
            </div><!-- Right Column -->
            <div class="space-y-6"><!-- Rental Preferences Card -->
                <div class="info-card p-6 rounded-xl animate-fade-up" style="animation-delay: 0.2s;">
                    <h3 class="text-xl font-bold mb-6"
                        style="font-family: Poppins, system-ui, sans-serif; color: var(--color-dark-text);">Rental
                        Preferences</h3>
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div><label class="block text-sm font-medium mb-1"
                                    style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Preferred
                                    Car Type</label>
                                <p class="text-sm"
                                    style="color: var(--color-dark-text); font-family: Inter, system-ui, sans-serif;">
                                    SUV</p>
                            </div>
                            <div><label class="block text-sm font-medium mb-1"
                                    style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Fuel
                                    Type</label>
                                <p class="text-sm"
                                    style="color: var(--color-dark-text); font-family: Inter, system-ui, sans-serif;">
                                    Gasoline</p>
                            </div>
                        </div>
                        <div><label class="block text-sm font-medium mb-1"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Default
                                Payment</label>
                            <p class="text-sm"
                                style="color: var(--color-dark-text); font-family: Inter, system-ui, sans-serif;">••••
                                •••• •••• 4567 (Visa)</p>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between"><span class="text-sm font-medium"
                                    style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Email
                                    Notifications</span>
                                <div class="toggle-switch active" data-toggle="email">
                                    <div class="toggle-slider"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between"><span class="text-sm font-medium"
                                    style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">SMS
                                    Notifications</span>
                                <div class="toggle-switch" data-toggle="sms">
                                    <div class="toggle-slider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Security Settings Card -->
                <div class="info-card p-6 rounded-xl animate-fade-up" style="animation-delay: 0.3s;">
                    <h3 class="text-xl font-bold mb-6"
                        style="font-family: Poppins, system-ui, sans-serif; color: var(--color-dark-text);">Security
                        Settings</h3>
                    <div class="space-y-4"><button class="btn-secondary w-full py-3 rounded-xl font-medium"
                            style="font-family: Inter, system-ui, sans-serif;"> Change Password </button>
                        <div class="flex items-center justify-between">
                            <div><span class="text-sm font-medium block"
                                    style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Two-Factor
                                    Authentication</span> <span class="text-xs"
                                    style="color: #9ca3af; font-family: Inter, system-ui, sans-serif;">Add extra
                                    security to your account</span>
                            </div>
                            <div class="toggle-switch active" data-toggle="2fa">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>
                        <div><label class="block text-sm font-medium mb-2"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Recent
                                Login Activity</label>
                            <div class="text-xs space-y-1"
                                style="color: #9ca3af; font-family: Inter, system-ui, sans-serif;">
                                <p>• Today, 2:30 PM - New York, NY</p>
                                <p>• Yesterday, 9:15 AM - New York, NY</p>
                                <p>• 3 days ago, 6:45 PM - New York, NY</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- Recent Activity Section -->
        <section class="info-card p-6 rounded-xl animate-fade-up" style="animation-delay: 0.4s;">
            <h3 class="text-xl font-bold mb-6"
                style="font-family: Poppins, system-ui, sans-serif; color: var(--color-dark-text);">Recent Activity</h3>
            <div class="space-y-4"><!-- Activity Item 1 -->
                <div class="activity-item p-4 rounded-xl border" style="border-color: rgba(250, 204, 21, 0.1);">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-12 rounded-lg flex items-center justify-center"
                            style="background: rgba(250, 204, 21, 0.1);">
                            <svg class="w-8 h-8" style="color: var(--color-accent);" fill="currentColor"
                                viewbox="0 0 24 24">
                                <path
                                    d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium"
                                style="color: var(--color-dark-text); font-family: Inter, system-ui, sans-serif;">BMW X5
                                Rental</h4>
                            <p class="text-sm"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Dec 15,
                                2024 - Dec 18, 2024</p>
                        </div>
                        <div class="text-right"><span class="status-badge status-completed">Completed</span>
                            <p class="text-sm mt-1"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">$450.00</p>
                        </div>
                    </div>
                </div><!-- Activity Item 2 -->
                <div class="activity-item p-4 rounded-xl border" style="border-color: rgba(250, 204, 21, 0.1);">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-12 rounded-lg flex items-center justify-center"
                            style="background: rgba(250, 204, 21, 0.1);">
                            <svg class="w-8 h-8" style="color: var(--color-accent);" fill="currentColor"
                                viewbox="0 0 24 24">
                                <path
                                    d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium"
                                style="color: var(--color-dark-text); font-family: Inter, system-ui, sans-serif;">
                                Mercedes C-Class</h4>
                            <p class="text-sm"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Jan 5, 2025
                                - Jan 8, 2025</p>
                        </div>
                        <div class="text-right"><span class="status-badge status-pending">Pending</span>
                            <p class="text-sm mt-1"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">$380.00</p>
                        </div>
                    </div>
                </div><!-- Activity Item 3 -->
                <div class="activity-item p-4 rounded-xl border" style="border-color: rgba(250, 204, 21, 0.1);">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-12 rounded-lg flex items-center justify-center"
                            style="background: rgba(239, 68, 68, 0.1);">
                            <svg class="w-8 h-8 text-red-400" fill="currentColor" viewbox="0 0 24 24">
                                <path
                                    d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium"
                                style="color: var(--color-dark-text); font-family: Inter, system-ui, sans-serif;">Audi
                                A4 Rental</h4>
                            <p class="text-sm"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Nov 20,
                                2024 - Nov 23, 2024</p>
                        </div>
                        <div class="text-right"><span class="status-badge status-cancelled">Cancelled</span>
                            <p class="text-sm mt-1"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">$320.00</p>
                        </div>
                    </div>
                </div><!-- Activity Item 4 -->
                <div class="activity-item p-4 rounded-xl border" style="border-color: rgba(250, 204, 21, 0.1);">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-12 rounded-lg flex items-center justify-center"
                            style="background: rgba(34, 197, 94, 0.1);">
                            <svg class="w-8 h-8 text-green-400" fill="currentColor" viewbox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium"
                                style="color: var(--color-dark-text); font-family: Inter, system-ui, sans-serif;">Review
                                Submitted</h4>
                            <p class="text-sm"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">BMW X5 - 5
                                stars</p>
                        </div>
                        <div class="text-right"><span class="status-badge status-completed">Completed</span>
                            <p class="text-sm mt-1"
                                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">Dec 18,
                                2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- Footer -->
    {{-- <footer class="mt-16 py-8" style="background: var(--color-primary); border-top: 1px solid rgba(250, 204, 21, 0.2);">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <p class="text-sm mb-4 md:mb-0"
                    style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">© 2025 Auto Heaven —
                    All rights reserved.</p>
                <div class="flex items-center space-x-6"><a href="#terms" class="text-sm transition-colors duration-300"
                        style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;"
                        onmouseover="this.style.color='var(--color-accent)'"
                        onmouseout="this.style.color='var(--color-gray)'">Terms</a> <a href="#policy"
                        class="text-sm transition-colors duration-300"
                        style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;"
                        onmouseover="this.style.color='var(--color-accent)'"
                        onmouseout="this.style.color='var(--color-gray)'">Privacy Policy</a> <a href="#contact"
                        class="text-sm transition-colors duration-300"
                        style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;"
                        onmouseover="this.style.color='var(--color-accent)'"
                        onmouseout="this.style.color='var(--color-gray)'">Contact</a>
                </div>
            </div>
        </div>
    </footer> --}}
    
</body>

</html>