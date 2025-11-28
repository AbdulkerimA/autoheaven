
<x-app-layout>
    <div class="py-12 bg-[#0f172a]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- user information component--}}
            <x-user-info />

            <livewire:personal-information/>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg info-card animate-fade-up" style="animation-delay: 0.1s;" >
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg info-card animate-fade-up" style="animation-delay: 0.1s;">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

