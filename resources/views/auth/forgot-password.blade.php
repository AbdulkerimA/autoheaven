<x-guest-layout>
    <div class="mb-4 text-md text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" 
                            class="block text-sm font-medium mb-2 " 
                            style="
                                color: var(--color-dark-text);
                                font-family: Inter, system-ui, sans-serif;
                            " 
            />
            <x-text-input id="email" 
                            class="input-field w-full px-4 py-3 rounded-xl focus:outline-none"
                            style="
                            color: var(--color-dark-text);
                            font-family: Inter, system-ui, sans-serif;
                            " 
                            type="email" name="email" 
                            :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
