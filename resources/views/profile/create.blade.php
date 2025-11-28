<!doctype html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Heaven - Complete Your Profile</title>
    @vite(['resources/css/addprofile.css'])
</head>

<body
    class="font-body bg-dark-bg light:bg-light-bg text-dark-text light:text-light-text transition-all duration-500 min-h-screen">
    <!-- Header -->
    <x-header />
    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-6 py-12">
        <!-- Profile Form Card -->
        <div class="profile-card golden-glow p-8 lg:p-12 rounded-xl animate-fade-up"><!-- Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl lg:text-4xl font-heading font-bold mb-4 text-dark-text light:text-light-text">
                    Complete Your Profile
                </h2>
                <p class="text-lg text-gray-400 light:text-gray-600 font-body max-w-2xl mx-auto">
                    We need a few more details to set up your account and 
                    verify your identity for secure car rentals.
                </p>
            </div>
            <!-- Profile Form -->
            <form method="POST" action="{{route('profile.store')}}" enctype="multipart/form-data" class="space-y-8" id="profileForm">
                @csrf
                <!-- Profile Photo Section -->
                <div class="text-center animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="mb-6">
                        <div class="relative inline-block">
                            <img id="profilePhoto"
                                src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 120 120'><rect width='120' height='120' fill='%23374151'/><circle cx='60' cy='45' r='20' fill='%23facc15'/><path d='M20 100 Q20 80 40 80 h40 Q100 80 100 100' fill='%23facc15'/></svg>"
                                alt="Profile Photo" class="profile-photo mx-auto"> 
                            <button type="button"
                                id="photoUploadBtn"
                                class="absolute bottom-0 right-0 bg-accent hover:bg-warm-amber text-primary p-2 rounded-full transition-all duration-300 transform hover:scale-110">
                                <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <input type="file" id="photoInput" name="profilePhoto" accept="image/*" class="hidden">
                    <p class="text-sm text-gray-400 light:text-gray-600 font-body">
                        Click the camera icon to upload yourprofile photo
                    </p>
                    <x-input-error :messages="$errors->get('profilePhoto')"/>
                </div>
                <!-- Personal Information Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 animate-fade-up" style="animation-delay: 0.2s;">
                    <!-- Full Name -->
                    <!-- Phone Number -->
                    <div>
                        <label for="phone"
                            class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body"> Phone
                            Number * </label> 
                            <input type="tel" id="phone" name="phone"
                            class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none"
                            placeholder="+251904004053" required>
                            <x-input-error :messages="$errors->get('phone')"/>
                    </div>
                    <!-- Date of Birth -->
                    <div><label for="dateOfBirth"
                            class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body"> Date
                            of Birth * </label> 
                            <input type="date" id="dateOfBirth" name="dateOfBirth"
                            class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none"
                            required>
                            <x-input-error :messages="$errors->get('dateOfBirth')"/>
                    </div>
                    <!-- Gender -->
                    <div>
                        <label for="gender"
                            class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body">
                            Gender 
                        </label> 
                        <select id="gender" name="gender"
                            class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text font-body focus:outline-none">
                            <option value="" class="bg-gray-900 text-white">Select gender</option>
                            <option value="male" class="bg-gray-900 text-white">Male</option>
                            <option value="female" class="bg-gray-900 text-white">Female</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')"/>
                    </div>
                    <!-- Role -->
                    <div>
                        <label for="role"
                            class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body">
                            Select Your Role 
                        </label> 
                        <select id="gender" name="role"
                            class="input-field w-full px-4 py-3 rounded-xl font-body focus:outline-none">
                            <option value="customer" class="bg-gray-900 text-white">Customer</option>
                            <option value="owner" class="bg-gray-900 text-white">owner</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')"/>
                    </div>

                </div>
                <!-- Address Section -->
                <div class="animate-fade-up" style="animation-delay: 0.3s;">
                    <h3 class="text-xl font-heading font-semibold mb-4 text-dark-text light:text-light-text">Address
                        Information</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6"><!-- Street Address -->
                        <div class="lg:col-span-2"><label for="street"
                                class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body">
                                Street Address * </label> 
                                <input type="text" id="street" name="street"
                                class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none"
                                placeholder="Addis abeba, Mexico" required>
                                <x-input-error :messages="$errors->get('street')"/>
                        </div>
                        <!-- City -->
                        <div><label for="city"
                                class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body">
                                City * </label> 
                                <input type="text" id="city" name="city"
                                class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none"
                                placeholder="Addis abeba" required>
                                <x-input-error :messages="$errors->get('city')"/>
                        </div><!-- State/Region -->
                        <div><label for="region"
                                class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body">
                                State/Region * </label> 
                                <input type="text" id="region" name="region"
                                class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none"
                                placeholder="AA" required>
                                <x-input-error :messages="$errors->get('region')"/>
                        </div>
                    </div>
                </div>
                <!-- Driver's License Section -->
                <div class="animate-fade-up" style="animation-delay: 0.4s;">
                    <h3 class="text-xl font-heading font-semibold mb-4 text-dark-text light:text-light-text">
                        Driver'sLicense
                    </h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- License Number -->
                        <div><label for="licenseNumber"
                                class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body">
                                License Number </label> 
                                <input type="text" id="licenseNumber" name="licenseNumber"
                                class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none"
                                placeholder="D123456789">
                                <x-input-error :messages="$errors->get('licenseNumber')"/>
                        </div>
                        <!-- License Upload -->
                        <div>
                            <label
                                class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body">
                                License Photo 
                            </label>
                            <div class="upload-zone p-6 rounded-xl text-center cursor-pointer" id="licenseUpload">
                                <svg class="w-8 h-8 text-accent mx-auto mb-2" fill="none" stroke="currentColor"
                                    viewbox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="text-sm text-gray-400 light:text-gray-600 font-body">
                                    Click or drag to upload
                                </p>
                            </div>
                            <input type="file" id="licenseInput" name="licensePhoto" accept="image/*" class="hidden">
                            <div id="licensePreview" class="hidden"></div>
                            <x-input-error :messages="$errors->get('licensePhoto')"/>
                        </div>
                    </div>
                </div>
                <!-- Emergency Contact Section -->
                <div class="animate-fade-up" style="animation-delay: 0.5s;">
                    <h3 class="text-xl font-heading font-semibold mb-4 text-dark-text light:text-light-text">Emergency
                        Contact</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6"><!-- Emergency Contact Name -->
                        <div><label for="emergencyName"
                                class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body">
                                Contact Name * </label> 
                                <input type="text" id="emergencyName" name="emergencyName"
                                class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none"
                                placeholder="Jane Smith" required>
                                <x-input-error :messages="$errors->get('emergencyName')"/>
                        </div>
                        <!-- Emergency Contact Phone -->
                        <div><label for="emergencyPhone"
                                class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body">
                                Contact Phone * </label> <input type="tel" id="emergencyPhone" name="emergencyPhone"
                                class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none"
                                placeholder="+251904004053" required>
                                <x-input-error :messages="$errors->get('emergencyPhone')"/>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="text-center pt-6 animate-fade-up" style="animation-delay: 0.6s;">
                    <button type="submit"
                        class="btn-primary px-8 py-4 rounded-xl font-bold text-lg font-heading animate-pulse-glow"> 
                        Save &amp; Continue 
                    </button>
                </div>

            </form>
        </div><!-- Success Message (Hidden by default) -->
        <div id="successMessage" class="hidden profile-card p-8 rounded-xl text-center mt-8 animate-fade-up">
            <div
                class="w-16 h-16 bg-gradient-to-br from-accent to-warm-amber rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-primary" fill="currentColor" viewbox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <h3 class="text-2xl font-heading font-bold mb-4 text-dark-text light:text-light-text">Profile Updated
                Successfully!</h3>
            <p class="text-lg text-gray-400 light:text-gray-600 font-body mb-6">You're ready to rent your first car and
                start your Auto Heaven journey.</p><button id="exploreCarsBtn"
                class="btn-primary px-8 py-3 rounded-xl font-bold text-lg font-heading"> Explore Cars </button>
        </div>
    </main>
    <!-- Footer -->
    <x-footer />

    <script>
        // Custom modal function
        function showModal(title, message) {
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50 animate-fade-in';
            modal.innerHTML = `
                <div class="bg-white light:bg-light-bg p-8 rounded-xl shadow-2xl max-w-md mx-4 animate-scale-in">
                    <h3 class="text-2xl font-heading font-bold text-accent mb-4">${title}</h3>
                    <p class="text-light-text light:text-light-text mb-6 leading-relaxed font-body">${message}</p>
                    <button onclick="this.parentElement.parentElement.remove()" class="btn-primary font-bold px-6 py-3 rounded-xl transition-all duration-300">
                        Close
                    </button>
                </div>
            `;
            document.body.appendChild(modal);
        }

        // Profile Photo Upload
        const photoUploadBtn = document.getElementById('photoUploadBtn');
        const photoInput = document.getElementById('photoInput');
        const profilePhoto = document.getElementById('profilePhoto');

        photoUploadBtn.addEventListener('click', () => {
            photoInput.click();
        });

        photoInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        profilePhoto.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    showModal('Invalid File', 'Please select a valid image file.');
                }
            }
        });

        // License Upload
        const licenseUpload = document.getElementById('licenseUpload');
        const licenseInput = document.getElementById('licenseInput');
        const licensePreview = document.getElementById('licensePreview');

        licenseUpload.addEventListener('click', () => {
            licenseInput.click();
        });

        licenseUpload.addEventListener('dragover', (e) => {
            e.preventDefault();
            licenseUpload.classList.add('dragover');
        });

        licenseUpload.addEventListener('dragleave', () => {
            licenseUpload.classList.remove('dragover');
        });

        licenseUpload.addEventListener('drop', (e) => {
            e.preventDefault();
            licenseUpload.classList.remove('dragover');
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                handleLicenseFile(files[0]);
            }
        });

        licenseInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                handleLicenseFile(file);
            }
        });

        function handleLicenseFile(file) {
            if (file.type.startsWith('image/')) {
                licensePreview.innerHTML = `
                    <div class="file-preview">
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                            </svg>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-dark-text light:text-light-text">${file.name}</p>
                                <p class="text-xs text-gray-400">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
                            </div>
                            <button type="button" onclick="removeLicenseFile()" class="text-red-400 hover:text-red-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                `;
                licensePreview.classList.remove('hidden');
            } else {
                showModal('Invalid File', 'Please select a valid image file.');
            }
        }

        function removeLicenseFile() {
            licensePreview.classList.add('hidden');
            licenseInput.value = '';
        }

        // Form submission
        // document.getElementById('profileForm').addEventListener('submit', function (e) {
        //     // e.preventDefault();


        //     const requiredFields = ['fullName', 'phone', 'dateOfBirth', 'street', 'city', 'region', 'emergencyName', 'emergencyPhone'];
        //     const missingFields = [];

        //     requiredFields.forEach(field => {
        //         const value = document.getElementById(field).value.trim();
        //         if (!value) {
        //             missingFields.push(field);
        //         }
        //     });

        //     if (missingFields.length > 0) {
        //         showModal('Missing Information', 'Please fill in all required fields marked with *');
        //         return;
        //     }

        //     // Show success message
        //     document.querySelector('.profile-card').style.display = 'none';
        //     document.getElementById('successMessage').classList.remove('hidden');

        //     // Scroll to success message
        //     document.getElementById('successMessage').scrollIntoView({
        //         behavior: 'smooth',
        //         block: 'center'
        //     });
        // });

        // Skip button functionality
        document.getElementById('skipButton').addEventListener('click', function () {
            showModal('Profile Skipped', 'You can complete your profile later from your account settings. Redirecting to dashboard...');
        });

        // Explore Cars button functionality
        document.getElementById('exploreCarsBtn').addEventListener('click', function () {
            showModal('Explore Cars', 'Redirecting to our car selection page...');
        });
    </script>

</html>