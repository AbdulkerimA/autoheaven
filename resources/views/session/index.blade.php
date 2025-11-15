<!doctype html>
<html lang="en" class="dark">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auto Heaven - Login</title>
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
                        'scale-in': 'scaleIn 0.5s ease-out'
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
        
        .hero-bg {
            background: linear-gradient(135deg, rgba(17, 24, 39, 0.7) 0%, rgba(17, 24, 39, 0.9) 100%),
                        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 800"><rect width="1200" height="800" fill="%230f172a"/><path d="M0,400 Q300,200 600,400 T1200,400 L1200,800 L0,800 Z" fill="%231f2937" opacity="0.4"/><path d="M0,600 Q400,450 800,600 T1200,600 L1200,800 L0,800 Z" fill="%23374151" opacity="0.3"/><circle cx="150" cy="120" r="60" fill="%23facc15" opacity="0.2"/><circle cx="900" cy="180" r="80" fill="%23f59e0b" opacity="0.2"/><circle cx="1050" cy="300" r="40" fill="%23111827" opacity="0.2"/><rect x="200" y="300" width="800" height="200" fill="%23facc15" opacity="0.05" rx="20"/><rect x="100" y="500" width="1000" height="100" fill="%23f59e0b" opacity="0.08" rx="15"/></svg>');
            background-size: cover;
            background-position: center;
            filter: blur(1px);
        }
        
        .light .hero-bg {
            background: linear-gradient(135deg, rgba(249, 250, 251, 0.8) 0%, rgba(249, 250, 251, 0.95) 100%),
                        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 800"><rect width="1200" height="800" fill="%23f9fafb"/><path d="M0,400 Q300,200 600,400 T1200,400 L1200,800 L0,800 Z" fill="%23e5e7eb" opacity="0.3"/><path d="M0,600 Q400,450 800,600 T1200,600 L1200,800 L0,800 Z" fill="%23d1d5db" opacity="0.2"/><circle cx="150" cy="120" r="60" fill="%23facc15" opacity="0.1"/><circle cx="900" cy="180" r="80" fill="%23f59e0b" opacity="0.1"/><circle cx="1050" cy="300" r="40" fill="%23111827" opacity="0.1"/><rect x="200" y="300" width="800" height="200" fill="%23facc15" opacity="0.03" rx="20"/><rect x="100" y="500" width="1000" height="100" fill="%23f59e0b" opacity="0.05" rx="15"/></svg>');
            filter: blur(1px);
        }
        
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
        
        .oauth-btn {
            transition: all 0.3s ease;
            border: 1px solid rgba(250, 204, 21, 0.2);
        }
        
        .oauth-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(250, 204, 21, 0.15);
            border-color: rgba(250, 204, 21, 0.4);
        }
        
        .dark .oauth-btn {
            background: rgba(17, 24, 39, 0.8);
            border-color: rgba(250, 204, 21, 0.2);
        }
        
        .light .oauth-btn {
            background: rgba(249, 250, 251, 0.9);
            border-color: rgba(17, 24, 39, 0.1);
        }
        
        .login-card {
            background: rgba(17, 24, 39, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(250, 204, 21, 0.2);
            box-shadow: 0 0 40px rgba(250, 204, 21, 0.1);
        }
        
        .light .login-card {
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
    </style>
  
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <script src="/_sdk/element_sdk.js" type="text/javascript"></script>
 </head>
 <body class="font-body bg-dark-bg light:bg-light-bg text-dark-text light:text-light-text transition-all duration-500 min-h-screen"><!-- Theme Toggle - Fixed Position -->
  <div class="fixed top-6 right-6 z-50">
   <div class="theme-toggle" id="themeToggle">
    <div class="theme-toggle-slider">
     <svg id="moonIcon" class="w-3 h-3 text-primary" fill="currentColor" viewbox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
     </svg>
     <svg id="sunIcon" class="w-3 h-3 text-yellow-600 hidden" fill="currentColor" viewbox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
     </svg>
    </div>
   </div>
  </div>
  <!-- Main Container -->
  <div class="min-h-screen flex items-baseline">
    <!-- Left Section - Hero -->
   <div class="hidden lg:flex lg:w-1/3  overflow-hidden sticky top-10 left-0">
    <div class="hero-bg absolute inset-0"></div>
    <div class="relative z-10 flex flex-col justify-center items-center text-center px-6 text-white"><!-- Logo -->
     <div class="flex items-center space-x-4 mb-8 animate-fade-up">
      <div class="w-12 h-12 bg-gradient-to-br from-accent to-warm-amber rounded-xl flex items-center justify-center">
       <svg class="w-7 h-7 text-primary" fill="currentColor" viewbox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z" />
       </svg>
      </div>
      <h1 class="text-3xl font-heading font-bold">Auto Heaven</h1>
     </div><!-- Tagline -->
     <div class="animate-fade-up" style="animation-delay: 0.2s;">
      <h2 class="text-4xl md:text-5xl font-heading font-bold mb-6 leading-tight">Your Dream Ride, <br><span class="bg-gradient-to-r from-accent to-warm-amber bg-clip-text text-transparent">One Click Away.</span></h2>
      <p class="text-xl text-white/80 max-w-md mx-auto font-body">Find, book, and drive premium cars easily with Auto Heaven.</p>
     </div>
    </div>
   </div>
   <!-- Right Section - Login Form -->
   <div class="w-full lg:w-1/2 flex items-center justify-center p-8 lg:p-12">
    <div class="w-full max-w-md"><!-- Mobile Logo (visible on small screens) -->
     <div class="lg:hidden flex items-center justify-center space-x-3 mb-8 animate-fade-up">
      <div class="w-10 h-10 bg-gradient-to-br from-accent to-warm-amber rounded-xl flex items-center justify-center">
       <svg class="w-6 h-6 text-primary" fill="currentColor" viewbox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z" />
       </svg>
      </div>
      <h1 class="text-2xl font-heading font-bold text-dark-text light:text-light-text">Auto Heaven</h1>
     </div><!-- Login Card -->
     <div class="login-card golden-glow p-8 rounded-xl animate-fade-up" style="animation-delay: 0.1s;"><!-- Header -->
      <div class="text-center mb-8">
       <h2 class="text-3xl font-heading font-bold mb-2 text-dark-text light:text-light-text">Welcome Back</h2>
       <p class="text-gray-400 light:text-gray-600 font-body">Sign in to your Auto Heaven account</p>
      </div><!-- Login Form -->
      <form class="space-y-6" id="loginForm"><!-- Email Field -->
       <div><label for="email" class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body"> Email Address </label> <input type="email" id="email" name="email" class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none" placeholder="Enter your email" required>
       </div><!-- Password Field -->
       <div><label for="password" class="block text-sm font-medium mb-2 text-dark-text light:text-light-text font-body"> Password </label> <input type="password" id="password" name="password" class="input-field w-full px-4 py-3 rounded-xl text-dark-text light:text-light-text placeholder-gray-400 font-body focus:outline-none" placeholder="Enter your password" required>
       </div><!-- Remember Me & Forgot Password -->
       <div class="flex items-center justify-between"><label class="flex items-center"> <input type="checkbox" class="w-4 h-4 text-accent bg-transparent border-gray-400 rounded focus:ring-accent focus:ring-2"> <span class="ml-2 text-sm text-gray-400 light:text-gray-600 font-body">Remember me</span> </label> <a href="#forgot" class="text-sm text-accent hover:text-warm-amber transition-colors duration-300 font-body"> Forgot password? </a>
       </div><!-- Login Button --> <button type="submit" class="btn-primary w-full py-3 rounded-xl font-bold text-lg font-heading"> Sign In </button>
      </form><!-- Divider -->
      <div class="my-8 flex items-center">
       <div class="flex-1 border-t border-gray-600 light:border-gray-300"></div><span class="px-4 text-sm text-gray-400 light:text-gray-600 font-body">Or continue with</span>
       <div class="flex-1 border-t border-gray-600 light:border-gray-300"></div>
      </div><!-- OAuth Buttons -->
      <div class="space-y-3"><button class="oauth-btn w-full py-3 px-4 rounded-xl flex items-center justify-center space-x-3 font-body font-medium text-dark-text light:text-light-text">
        <svg class="w-5 h-5" viewbox="0 0 24 24"><path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" /> <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" /> <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" /> <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
        </svg><span>Continue with Google</span> </button> <button class="oauth-btn w-full py-3 px-4 rounded-xl flex items-center justify-center space-x-3 font-body font-medium text-dark-text light:text-light-text">
        <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
        </svg><span>Continue with Facebook</span> </button> <button class="oauth-btn w-full py-3 px-4 rounded-xl flex items-center justify-center space-x-3 font-body font-medium text-dark-text light:text-light-text">
        <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 24 24"><path d="M12.152 6.896c-.948 0-2.415-1.078-3.96-1.04-2.04.027-3.91 1.183-4.961 3.014-2.117 3.675-.546 9.103 1.519 12.09 1.013 1.454 2.208 3.09 3.792 3.039 1.52-.065 2.09-.987 3.935-.987 1.831 0 2.35.987 3.96.948 1.637-.026 2.676-1.48 3.676-2.948 1.156-1.688 1.636-3.325 1.662-3.415-.039-.013-3.182-1.221-3.22-4.857-.026-3.04 2.48-4.494 2.597-4.559-1.429-2.09-3.623-2.324-4.39-2.376-2-.156-3.675 1.09-4.61 1.09zM15.53 3.83c.843-1.012 1.4-2.427 1.245-3.83-1.207.052-2.662.805-3.532 1.818-.78.896-1.454 2.338-1.273 3.714 1.338.104 2.715-.688 3.559-1.701" />
        </svg><span>Continue with Apple</span> </button>
      </div><!-- Footer -->
      <div class="mt-8 text-center">
       <p class="text-sm text-gray-400 light:text-gray-600 font-body">Don't have an account? <a href="/signup" class="text-accent hover:text-warm-amber transition-colors duration-300 font-medium">Sign Up</a></p>
       <p class="text-xs text-gray-500 light:text-gray-500 mt-4 font-body">© 2025 Auto Heaven</p>
      </div>
     </div>
    </div>
   </div>
  </div>
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

        // Form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            if (email && password) {
                showModal('Login Successful', `Welcome back! Redirecting to your dashboard...`);
            } else {
                showModal('Login Error', 'Please fill in all required fields.');
            }
        });

        // OAuth button functionality
        document.querySelectorAll('.oauth-btn').forEach(button => {
            button.addEventListener('click', function() {
                const provider = this.textContent.includes('Google') ? 'Google' : 
                               this.textContent.includes('Facebook') ? 'Facebook' : 'Apple';
                showModal(`${provider} Login`, `Redirecting to ${provider} authentication...`);
            });
        });

        // Link functionality
        document.querySelectorAll('a[href="#forgot"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                showModal('Password Reset', 'Password reset link will be sent to your email address.');
            });
        });

        document.querySelectorAll('a[href="#signup"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                showModal('Sign Up', 'Redirecting to registration page...');
            });
        });
    </script>
  <script>
        // Theme Toggle Functionality
        const themeToggle = document.getElementById('themeToggle');
        const sunIcon = document.getElementById('sunIcon');
        const moonIcon = document.getElementById('moonIcon');
        const html = document.documentElement;

        // Check for saved theme preference or default to light mode
        const currentTheme = localStorage.getItem('theme') || 'light';
        
        if (currentTheme === 'dark') {
            html.classList.add('dark');
            themeToggle.classList.add('active');
            sunIcon.classList.add('hidden');
            moonIcon.classList.remove('hidden');
        }

        themeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            themeToggle.classList.toggle('active');
            
            if (html.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            } else {
                localStorage.setItem('theme', 'light');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            }
        });

        // Scroll Reveal Animation
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

        // Custom modal function
        function showModal(title, message) {
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50 animate-fade-in';
            modal.innerHTML = `
                <div class="bg-white p-8 rounded-xl shadow-2xl max-w-md mx-4 animate-scale-in">
                    <h3 class="text-2xl font-heading font-bold text-accent mb-4">${title}</h3>
                    <p class="text-light-text mb-6 leading-relaxed font-body">${message}</p>
                    <button onclick="this.parentElement.parentElement.remove()" class="btn-primary font-bold px-6 py-3 rounded-xl transition-all duration-300">
                        Close
                    </button>
                </div>
            `;
            document.body.appendChild(modal);
        }

        // Button functionality
        document.querySelectorAll('button').forEach(button => {
            if (button.textContent.includes('Rent a Car')) {
                button.addEventListener('click', function() {
                    document.querySelector('#cars').scrollIntoView({ behavior: 'smooth' });
                });
            }
            if (button.textContent.includes('List Your Car')) {
                button.addEventListener('click', function() {
                    showModal('List Your Car', 'Ready to start earning with your vehicle? Redirecting to owner registration...');
                });
            }
            if (button.textContent.includes('Book Now')) {
                button.addEventListener('click', function() {
                    const carName = this.closest('.card-hover').querySelector('h3').textContent;
                    showModal(`Book ${carName}`, 'Redirecting to secure booking page...');
                });
            }
            if (button.textContent.includes('Start Booking')) {
                button.addEventListener('click', function() {
                    document.querySelector('#cars').scrollIntoView({ behavior: 'smooth' });
                });
            }
            if (button.textContent.includes('Login') || button.textContent.includes('Sign Up')) {
                button.addEventListener('click', function() {
                    showModal('Authentication', 'Redirecting to secure login page...');
                });
            }
        });

        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.style.backgroundColor = html.classList.contains('dark') ? 'rgba(17, 24, 39, 0.95)' : 'rgba(249, 250, 251, 0.95)';
            } else {
                header.style.backgroundColor = html.classList.contains('dark') ? 'rgba(17, 24, 39, 0.85)' : 'rgba(249, 250, 251, 0.85)';
            }
        });
    </script>
 </body>
</html>