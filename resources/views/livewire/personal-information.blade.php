<div class="">
    <div class="info-card p-6 rounded-xl animate-fade-up" style="animation-delay: 0.1s;">
        <div class="flex items-start justify-between mb-6">
            <h3 class="text-xl font-bold"
                style="font-family: Poppins, system-ui, sans-serif; color: var(--color-dark-text);">
                Personal Information
            </h3>
            <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium" x-on:click.prevent="$dispatch('open-modal', 'edit-user-info')"> 
                Edit Details 
            </button>
        </div>
        <div class="space-y-4">
            <div class="bg-gray-300/10 rounded-xl border border-1 border-gray-300/5 px-4 py-6 ">
                <div class="grid grid-cols-2 gap-4 my-2">
                    <div>
                        <label class="block text-lg text-yellow-500 font-semibold mb-1">
                            Full Name
                        </label>
                        <p class="text-sm"
                            style="color: var(--color-dark-text);">
                            {{ $fullName }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-lg text-yellow-500 font-medium mb-1">
                            Email
                        </label>
                        <p class="text-sm"
                            style="color: var(--color-dark-text);">
                            {{ $email }}
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 my-2">
                    <div>
                        <label class="block text-lg text-yellow-500 font-medium mb-1">
                            Phone
                        </label>
                        <p class="text-sm" style="color: var(--color-dark-text);">
                            {{$tel ?? "pleas add your phone number"}}
                        </p>
                    </div>
                </div>
                <div class="my-2">
                    <label class="block text-lg text-yellow-500 font-medium mb-1">
                        Address
                    </label>
                    <p class="text-sm"
                        style="color: var(--color-dark-text);">
                        {{$address ?? "pleas add your address"}}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 bg-gray-300/10 px-4 py-6 rounded-xl">
                <div>
                    <label class="block text-lg text-yellow-500 font-semibold mb-1">
                        Gender
                    </label>
                    <p class="text-sm"
                        style="color: var(--color-dark-text);">
                        Male
                    </p>
                </div>
                <div><label class="block text-lg text-yellow-500 font-semibold mb-1">
                        Driver's License
                    </label>
                    <p class="text-sm"
                        style="color: var(--color-dark-text);">
                        D123456789
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{-- {{ dump($tel) }} --}}
    <x-modal name="edit-user-info" :show="$showModal" focusable>
        <form method="post" action="{{ route('personalinfo.edit') }}" class="p-6">
            @csrf
            @method('PATCH')

            <h2 class="text-lg font-medium text-yellow-500">
                {{ __('Edit your personal information') }}
            </h2>

            <div class="mt-6 ">
                <x-input-label for="userName" value="{{ __('User Name') }}" />

                <x-text-input
                    id="userName"
                    name="userName"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('user') }}"
                    value='{{ $userName }}'
                />

                <x-input-error  :messages="$errors->personalInfoUpdate->get('userName')" class="mt-2" />
            </div>

            {{-- full name --}}
            <div class="mt-6 ">
                <x-input-label for="fullName" value="{{ __('Full Name') }}" />

                <x-text-input
                    id="fullName"
                    name="fullName"
                    type="text"
                    class="mt-1 block w-3/4"
                    value='{{ $fullName }}'
                />

                <x-input-error :messages="$errors->personalInfoUpdate->get('fullName')" class="mt-2" />
            </div>

            {{-- email --}}
            <div class="mt-6 ">
                <x-input-label for="email" value="{{ __('Email') }}" />

                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    class="mt-1 block w-3/4"
                    value='{{ $email }}'
                />

                <x-input-error :messages="$errors->personalInfoUpdate->get('email')" class="mt-2" />
            </div>

            
            {{-- phone number --}}
            <div class="mt-6 ">
                <x-input-label for="tel" value="{{ __('Phone Number') }}" />

                <x-text-input
                    id="tel"
                    name="tel"
                    type="tel"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('+256') }}"
                    value="{{ $tel }}"
                />

                <x-input-error :messages="$errors->personalInfoUpdate->get('tel')" class="mt-2" />
            </div>

            {{-- address --}}
            <div class="mt-6 ">
                <x-input-label for="address" value="{{ __('Address') }}" />

                <x-text-input
                    id="address"
                    name="address"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('addis abeba') }}"
                    value="{{ $address }}"
                />

                <x-input-error :messages="$errors->personalInfoUpdate->get('address')" class="mt-2" />
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3" >
                    {{ __('update') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</div>