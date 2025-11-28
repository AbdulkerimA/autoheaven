@vite(['resources/js/profilepic.js'])

<section class="profile-banner rounded-2xl p-8 mb-8 animate-fade-up">
    <div class="flex flex-col lg:flex-row items-center lg:items-start space-y-6 lg:space-y-0 lg:space-x-8">
        <!-- Profile Photo -->
        <div class="relative golden-glow">
            <img id="profileImage"
                src="{{ asset('storage/'.Auth::user()->profile->profile_picture) }}"
                alt="Profile Photo" class="profile-photo"> 
                <button id="photoUploadBtn"
                class="absolute bottom-0 right-0 bg-accent hover:bg-warm-amber text-primary p-2 rounded-full transition-all duration-300 transform hover:scale-110">
                <svg class="w-5 h-5 text-yellow-500 text-xl" fill="#eab308" viewbox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                        clip-rule="evenodd" />
                </svg>
            </button> 
            <input type="file" id="photoInput" accept="image/*" class="hidden">
        </div>
        <!-- Profile Info -->
        <div class="flex-1 text-center lg:text-left">
            <h2 class="text-3xl lg:text-4xl font-bold mb-2"
                style="font-family: Poppins, system-ui, sans-serif; color: var(--color-dark-text);">
                {{ Auth::user()->name }}
            </h2>
            <p class="text-lg mb-4"
                style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">
                {{ Auth::user()->email }}
            </p>
            <!-- Badges -->
            <div class="flex flex-wrap justify-center lg:justify-start items-center space-x-4 mb-6">
                <div class="flex items-center space-x-2 px-3 py-1 rounded-full"
                    style="background: rgba(34, 197, 94, 0.2);">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewbox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg><span class="text-sm font-medium text-green-400"
                        style="font-family: Inter, system-ui, sans-serif;">Verified</span>
                </div><span class="text-sm"
                    style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">
                    Joined {{ Auth::user()->created_at->format('M Y') }}
                </span>
            </div><!-- Edit Profile Button --> <button id="editProfileBtn"
                class="btn-primary px-6 py-3 rounded-xl font-bold"
                style="font-family: Poppins, system-ui, sans-serif;"> Edit Profile </button>
        </div>
    </div>
</section>