<x-guest-layout>
    <!-- Header -->
    <div class="text-center mb-8">
        <h2
            class="text-3xl font-heading font-bold mb-2 text-dark-text dark:text-dark-text light:text-light-text">
            Create Account</h2>
        <p class="text-gray-400 dark:text-gray-400 light:text-gray-600 font-body">Join Auto Heaven and
            start your journey</p>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" 
                            class="block text-sm font-medium mb-2 " 
                            style="
                                color: var(--color-dark-text);
                                font-family: Inter, system-ui, sans-serif;
                            "    
            />
            <x-text-input 
                id="name" 
                class="input-field w-full px-4 py-3 rounded-xl focus:outline-none"
                style="
                color: var(--color-dark-text);
                font-family: Inter, system-ui, sans-serif;
                " 
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" 
                            class="block text-sm font-medium mb-2 " 
                            style="
                                color: var(--color-dark-text);
                                font-family: Inter, system-ui, sans-serif;
                            "
            />
            <x-text-input 
                id="email" 
                class="input-field w-full px-4 py-3 rounded-xl focus:outline-none"
                style="
                color: var(--color-dark-text);
                font-family: Inter, system-ui, sans-serif;
                "
                type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" 
                            class="block text-sm font-medium mb-2 " 
                            style="
                                color: var(--color-dark-text);
                                font-family: Inter, system-ui, sans-serif;
                            "
            />

            <x-text-input id="password"
                            class="input-field w-full px-4 py-3 rounded-xl focus:outline-none"
                            style="
                            color: var(--color-dark-text);
                            font-family: Inter, system-ui, sans-serif;
                            "
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" 
                            class="block text-sm font-medium mb-2 " 
                            style="
                                color: var(--color-dark-text);
                                font-family: Inter, system-ui, sans-serif;
                            "
             />

            <x-text-input id="password_confirmation"
                            class="input-field w-full px-4 py-3 rounded-xl focus:outline-none"
                            style="
                            color: var(--color-dark-text);
                            font-family: Inter, system-ui, sans-serif;
                            " 
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-400 hover:text-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
