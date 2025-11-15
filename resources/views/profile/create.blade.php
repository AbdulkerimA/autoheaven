<!doctype html>
<html lang="en" class="dark">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auto Heaven - Complete Your Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#111827',
                        accent: '#facc15',
                        'warm-amber': '#f59e0b',
                        'light-bg': '#f9fafb',
                        'light-text': '#374151',
                        'dark-bg': '#0f172a',
                        'dark-text': '#f9fafb'
                    },
                    fontFamily: {
                        'heading': ['Poppins', 'system-ui', 'sans-serif'],
                        'body': ['Inter', 'system-ui', 'sans-serif']
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-out',
                        'fade-up': 'fadeUp 0.8s ease-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'scale-in': 'scaleIn 0.5s ease-out',
                        'pulse-glow': 'pulseGlow 2s ease-in-out infinite'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        fadeUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        scaleIn: {
                            '0%': { opacity: '0', transform: 'scale(0.95)' },
                            '100%': { opacity: '1', transform: 'scale(1)' }
                        },
                        pulseGlow: {
                            '0%, 100%': { boxShadow: '0 0 20px rgba(250, 204, 21, 0.3)' },
                            '50%': { boxShadow: '0 0 40px rgba(250, 204, 21, 0.5)' }
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
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');
        
        .theme-toggle {
            position: relative;
            width: 56px;
            height: 28px;
            background: #374151;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .theme-toggle.active {
            background: #facc15;
        }
        
        .theme-toggle-slider {
            position: absolute;
            top: 2px;
            left: 2px;
            width: 24px;
            height: 24px;
            background: white;
            border-radius: 50%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .theme-toggle.active .theme-toggle-slider {
            transform: translateX(28px);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #facc15, #f59e0b);
            color: #111827;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 8px 25px rgba(250, 204, 21, 0.4);
        }
        
        .btn-secondary {
            background: transparent;
            border: 1px solid rgba(250, 204, 21, 0.3);
            color: #facc15;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: rgba(250, 204, 21, 0.1);
            border-color: #facc15;
            transform: translateY(-1px);
        }
        
        .profile-card {
            background: rgba(17, 24, 39, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(250, 204, 21, 0.2);
            box-shadow: 0 0 40px rgba(250, 204, 21, 0.1);
        }
        
        .light .profile-card {
            background: rgba(249, 250, 251, 0.95);
            border: 1px solid rgba(17, 24, 39, 0.1);
            box-shadow: 0 0 40px rgba(17, 24, 39, 0.05);
        }
        
        .input-field {
            background: rgba(249, 250, 251, 0.1);
            border: 1px solid rgba(250, 204, 21, 0.2);
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            border-color: #facc15;
            box-shadow: 0 0 0 3px rgba(250, 204, 21, 0.1);
            background: rgba(249, 250, 251, 0.15);
        }
        
        .light .input-field {
            background: rgba(17, 24, 39, 0.05);
            border-color: rgba(17, 24, 39, 0.2);
        }
        
        .light .input-field:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
            background: rgba(17, 24, 39, 0.08);
        }
        
        .golden-glow {
            position: relative;
        }
        
        .golden-glow::before {
            content: '';
            position: absolute;
            inset: -20px;
            background: radial-gradient(circle, rgba(250, 204, 21, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            z-index: -1;
            opacity: 0.6;
        }
        
        .light .golden-glow::before {
            background: radial-gradient(circle, rgba(245, 158, 11, 0.1) 0%, transparent 70%);
            opacity: 0.8;
        }
        
        .progress-bar {
            background: linear-gradient(90deg, #facc15 0%, #f59e0b 100%);
            height: 4px;
            border-radius: 2px;
            transition: width 0.5s ease;
        }
        
        .upload-zone {
            border: 2px dashed rgba(250, 204, 21, 0.3);
            transition: all 0.3s ease;
        }
        
        .upload-zone:hover {
            border-color: #facc15;
            background: rgba(250, 204, 21, 0.05);
        }
        
        .upload-zone.dragover {
            border-color: #facc15;
            background: rgba(250, 204, 21, 0.1);
            transform: scale(1.02);
        }
        
        .profile-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid #facc15;
            object-fit: cover;
        }
        
        .file-preview {
            background: rgba(250, 204, 21, 0.1);
            border: 1px solid rgba(250, 204, 21, 0.3);
            border-radius: 8px;
            padding: 12px;
            margin-top: 8px;
        }
    </style>
  {{-- <style>@view-transition { navigation: auto; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <script src="/_sdk/element_sdk.js" type="text/javascript"></script> --}}
 </head>
 <body class="font-body bg-dark-bg light:bg-light-bg text-dark-text light:text-light-text transition-all duration-500 min-h-screen"><!-- Header -->
  <header class="bg-primary/85 light:bg-light-bg/85 backdrop-blur-md border-b border-accent/20 sticky top-0 z-40">
   <div class="max-w-7xl mx-auto px-6 py-4">
    <div class="flex items-center justify-between"><!-- Logo -->
     <div class="flex items-center space-x-3">
      <div class="w-10 h-10 bg-gradient-to-br from-accent to-warm-amber rounded-xl flex items-center justify-center">
       <svg class="w-6 h-6 text-primary" fill="currentColor" viewbox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z" />
       </svg>
      </div>
      <h1 class="text-2xl font-heading font-bold text-dark-text light:text-light-text">Auto Heaven</h1>
     </div><!-- Progress Indicator -->
     <div class="hidden md:flex items-center space-x-4">
      <div class="text-sm font-body text-gray-400 light:text-gray-600">
       Step 2 of 2 — Complete Your Profile
      </div>
      <div class="w-32 h-1 bg-gray-600 light:bg-gray-300 rounded-full">
       <div class="progress-bar w-full"></div>
      </div>
     </div><!-- Skip Button & Theme Toggle -->
     <div class="flex items-center space-x-4"><button id="skipButton" class="btn-secondary px-4 py-2 rounded-lg font-body font-medium text-sm"> Skip for now </button>
      <div class="theme-toggle" id="themeToggle">
       <div class="theme-toggle-slider">
        <svg id="moonIcon" class="w-3 h-3 text-primary" fill="currentColor" viewbox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
        </svg>
        <svg id="sunIcon" class="w-3 h-3 text-yellow-600 hidden" fill="currentColor" viewbox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
        </svg>
       </div>
      </div>
     </div>
    </div>
   </div>
  </header><!-- Main Content -->
  <main class="max-w-4xl mx-auto px-6 py-12"><!-- Profile Form Card -->
   <div class="profile-card golden-glow p-8 lg:p-12 rounded-xl animate-fade-up"><!-- Header -->
    <div class="text-center mb-10">
     <h2 class="text-3xl lg:text-4xl font-heading font-bold mb-4 text-dark-text light:text-light-text">Complete Your Profile</h2>
     <p class="text-lg text-gray-400 light:text-gray-600 font-body max-w-2xl mx-auto">We need a few more details to set up your account and verify your identity for secure car rentals.</p>
    </div><!-- Profile Form -->
    <form class="space-y-8" id="profileForm"><!-- Profile Photo Section -->
     <div class="text-center animate-fade-up" style="animation-delay: 0.1s;">
      <div class="mb-6">
       <div class="relative inline-block"><img id="profilePhoto" src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 120 120'><rect width='120' height='120' fill='%23374151'/><circle cx='60' cy='45' r='20' fill='%23facc15'/><path d='M20 100 Q20 80 40 80 h40 Q100 80 100 100' fill='%23facc15'/></svg>" alt="Profile Photo" class="profile-photo mx-auto"> <button type="button" id="photoUploadBtn" class="absolute bottom-0 right-0 bg-accent hover:bg-warm-amber text-primary p-2 rounded-full transition-all duration-300 transform hover:scale-110">
         <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
         </svg></button>
       </div>
      </div><input type="file" id="photoInput" accept="image/*" class="hidden">
      <p class="text-sm text-gray-400 light:text-gray-600 font-body">Click the camera icon to upload your profile photo</p>
     </div><!-- Personal Information Grid -->
     <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 animate-fade-up" style="animation-delay: 0.2s;"><!-- Full Name -->
      <div><label for="fullName" class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body"> Full Name * </label> <input type="text" id="fullName" name="fullName" value="John Smith" class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none" placeholder="Enter your full name" required>
      </div><!-- Phone Number -->
      <div><label for="phone" class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body"> Phone Number * </label> <input type="tel" id="phone" name="phone" class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none" placeholder="+251904004053" required>
      </div><!-- Date of Birth -->
      <div><label for="dateOfBirth" class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body"> Date of Birth * </label> <input type="date" id="dateOfBirth" name="dateOfBirth" class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none" required>
      </div><!-- Gender -->
      <div><label for="gender" class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body"> Gender </label> <select id="gender" name="gender" class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text font-body focus:outline-none"> <option value="">Select gender</option> <option value="male">Male</option> <option value="female">Female</option> <option value="other">Other</option> <option value="prefer-not-to-say">Prefer not to say</option> </select>
      </div>
     </div><!-- Address Section -->
     <div class="animate-fade-up" style="animation-delay: 0.3s;">
      <h3 class="text-xl font-heading font-semibold mb-4 text-dark-text light:text-light-text">Address Information</h3>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6"><!-- Street Address -->
       <div class="lg:col-span-2"><label for="street" class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body"> Street Address * </label> <input type="text" id="street" name="street" class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none" placeholder="Addis abeba, Mexico" required>
       </div><!-- City -->
       <div><label for="city" class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body"> City * </label> <input type="text" id="city" name="city" class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none" placeholder="Addis abeba" required>
       </div><!-- State/Region -->
       <div><label for="region" class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body"> State/Region * </label> <input type="text" id="region" name="region" class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none" placeholder="AA" required>
       </div>
      </div>
     </div><!-- Driver's License Section -->
     <div class="animate-fade-up" style="animation-delay: 0.4s;">
      <h3 class="text-xl font-heading font-semibold mb-4 text-dark-text light:text-light-text">Driver's License (Optional)</h3>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6"><!-- License Number -->
       <div><label for="licenseNumber" class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body"> License Number </label> <input type="text" id="licenseNumber" name="licenseNumber" class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none" placeholder="D123456789">
       </div><!-- License Upload -->
       <div><label class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body"> License Photo </label>
        <div class="upload-zone p-6 rounded-xl text-center cursor-pointer" id="licenseUpload">
         <svg class="w-8 h-8 text-accent mx-auto mb-2" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
         </svg>
         <p class="text-sm text-gray-400 light:text-gray-600 font-body">Click or drag to upload</p>
        </div><input type="file" id="licenseInput" accept="image/*" class="hidden">
        <div id="licensePreview" class="hidden"></div>
       </div>
      </div>
     </div><!-- Emergency Contact Section -->
     <div class="animate-fade-up" style="animation-delay: 0.5s;">
      <h3 class="text-xl font-heading font-semibold mb-4 text-dark-text light:text-light-text">Emergency Contact</h3>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6"><!-- Emergency Contact Name -->
       <div><label for="emergencyName" class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body"> Contact Name * </label> <input type="text" id="emergencyName" name="emergencyName" class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none" placeholder="Jane Smith" required>
       </div><!-- Emergency Contact Phone -->
       <div><label for="emergencyPhone" class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body"> Contact Phone * </label> <input type="tel" id="emergencyPhone" name="emergencyPhone" class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none" placeholder="+251904004053" required>
       </div>
      </div>
     </div><!-- Submit Button -->
     <div class="text-center pt-6 animate-fade-up" style="animation-delay: 0.6s;"><button type="submit" class="btn-primary px-8 py-4 rounded-xl font-bold text-lg font-heading animate-pulse-glow"> Save &amp; Continue </button>
     </div>
    </form>
   </div><!-- Success Message (Hidden by default) -->
   <div id="successMessage" class="hidden profile-card p-8 rounded-xl text-center mt-8 animate-fade-up">
    <div class="w-16 h-16 bg-gradient-to-br from-accent to-warm-amber rounded-full flex items-center justify-center mx-auto mb-6">
     <svg class="w-8 h-8 text-primary" fill="currentColor" viewbox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
     </svg>
    </div>
    <h3 class="text-2xl font-heading font-bold mb-4 text-dark-text light:text-light-text">Profile Updated Successfully!</h3>
    <p class="text-lg text-gray-400 light:text-gray-600 font-body mb-6">You're ready to rent your first car and start your Auto Heaven journey.</p><button id="exploreCarsBtn" class="btn-primary px-8 py-3 rounded-xl font-bold text-lg font-heading"> Explore Cars </button>
   </div>
  </main><!-- Footer -->
  <footer class="text-center py-8">
   <p class="text-sm text-gray-500 light:text-gray-500 font-body">© 2025 Auto Heaven. All rights reserved.</p>
  </footer>
  <script>
        // Theme Toggle Functionality
        const themeToggle = document.getElementById('themeToggle');
        const sunIcon = document.getElementById('sunIcon');
        const moonIcon = document.getElementById('moonIcon');
        const html = document.documentElement;

        // Check for saved theme preference or default to dark mode
        const currentTheme = localStorage.getItem('theme') || 'dark';
        
        if (currentTheme === 'light') {
            html.classList.remove('dark');
            html.classList.add('light');
            themeToggle.classList.add('active');
            moonIcon.classList.add('hidden');
            sunIcon.classList.remove('hidden');
        } else {
            html.classList.add('dark');
            html.classList.remove('light');
            themeToggle.classList.remove('active');
            moonIcon.classList.remove('hidden');
            sunIcon.classList.add('hidden');
        }

        themeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            html.classList.toggle('light');
            themeToggle.classList.toggle('active');
            
            if (html.classList.contains('light')) {
                localStorage.setItem('theme', 'light');
                moonIcon.classList.add('hidden');
                sunIcon.classList.remove('hidden');
            } else {
                localStorage.setItem('theme', 'dark');
                moonIcon.classList.remove('hidden');
                sunIcon.classList.add('hidden');
            }
        });

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

        photoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
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

        licenseInput.addEventListener('change', function(e) {
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
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const requiredFields = ['fullName', 'phone', 'dateOfBirth', 'street', 'city', 'region', 'emergencyName', 'emergencyPhone'];
            const missingFields = [];
            
            requiredFields.forEach(field => {
                const value = document.getElementById(field).value.trim();
                if (!value) {
                    missingFields.push(field);
                }
            });
            
            if (missingFields.length > 0) {
                showModal('Missing Information', 'Please fill in all required fields marked with *');
                return;
            }
            
            // Show success message
            document.querySelector('.profile-card').style.display = 'none';
            document.getElementById('successMessage').classList.remove('hidden');
            
            // Scroll to success message
            document.getElementById('successMessage').scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center' 
            });
        });

        // Skip button functionality
        document.getElementById('skipButton').addEventListener('click', function() {
            showModal('Profile Skipped', 'You can complete your profile later from your account settings. Redirecting to dashboard...');
        });

        // Explore Cars button functionality
        document.getElementById('exploreCarsBtn').addEventListener('click', function() {
            showModal('Explore Cars', 'Redirecting to our car selection page...');
        });
    </script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'99625c8a92535451',t:'MTc2MTczNzY0Mi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>