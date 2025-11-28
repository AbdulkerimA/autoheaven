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
            <div class="bg-gray-300/10 rounded-xl border border-1 border-gray-300/5 px-4 py-6 grid grid-cols-3 ">
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
                <div>
                    <label class="block text-lg text-yellow-500 font-medium mb-1">
                        Phone
                    </label>
                    <p class="text-sm" style="color: var(--color-dark-text);">
                        {{$tel ?? "pleas add your phone number"}}
                    </p>
                </div>
                <div class="my-2">
                    <label class="block text-lg text-yellow-500 font-medium mb-1">
                        City
                    </label>
                    <p class="text-sm"
                        style="color: var(--color-dark-text);">
                        {{$city ?? "pleas add your address"}}
                    </p>
                </div>
                <div class="my-2">
                    <label class="block text-lg text-yellow-500 font-medium mb-1">
                        region
                    </label>
                    <p class="text-sm"
                        style="color: var(--color-dark-text);">
                        {{$region ?? "pleas add your address"}}
                    </p>
                </div>
                <div class="my-2">
                    <label class="block text-lg text-yellow-500 font-medium mb-1">
                        street
                    </label>
                    <p class="text-sm"
                        style="color: var(--color-dark-text);">
                        {{$street ?? "pleas add your address"}}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-3 bg-gray-300/10 px-4 py-6 rounded-xl">
                <div>
                    <label class="block text-lg text-yellow-500 font-semibold mb-1">
                        user name
                    </label>
                    <p class="text-sm"
                        style="color: var(--color-dark-text);">
                        {{ $userName }}
                    </p>
                </div>
                <div>
                    <label class="block text-lg text-yellow-500 font-semibold mb-1">
                        Gender
                    </label>
                    <p class="text-sm"
                        style="color: var(--color-dark-text);">
                        {{ $gender }}
                    </p>
                </div>
                <div>
                    <label class="block text-lg text-yellow-500 font-semibold mb-1">
                        Driver's License
                    </label>
                    <p class="text-sm"
                        style="color: var(--color-dark-text);">
                        {{ $license_number }}
                    </p>
                </div>
                <div class="mt-2">
                    <label class="block text-lg text-yellow-500 font-semibold mb-1">
                        Birth Date
                    </label>
                    <p class="text-sm"
                        style="color: var(--color-dark-text);">
                        {{ $dob }}
                    </p>
                </div>
                <div class="mt-2">
                    <label class="block text-lg text-yellow-500 font-semibold mb-1">
                        Emergency Contact Name
                    </label>
                    <p class="text-sm"
                        style="color: var(--color-dark-text);">
                        {{ $emergency_name }}
                    </p>
                </div>
                <div class="mt-2">
                    <label class="block text-lg text-yellow-500 font-semibold mb-1">
                       Emerjency contact phone
                    </label>
                    <p class="text-sm"
                        style="color: var(--color-dark-text);">
                        {{ $emergency_phone }}
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


            <div class="grid grid-cols-2">
                {{-- usrname --}}
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

                {{-- street --}}
                <div class="mt-6 ">
                    <x-input-label for="street" value="{{ __('Street') }}" />
                    <x-text-input
                        id="street"
                        name="street"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('addis abeba') }}"
                        value="{{ $street }}"
                    />
                    <x-input-error :messages="$errors->personalInfoUpdate->get('street')" class="mt-2" />
                </div>

                {{-- city --}}
                <div class="mt-6 ">
                    <x-input-label for="city" value="{{ __('City') }}" />
                    <x-text-input
                        id="city"
                        name="city"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('addis abeba') }}"
                        value="{{ $city }}"
                    />
                    <x-input-error :messages="$errors->personalInfoUpdate->get('city')" class="mt-2" />
                </div>

                {{-- region --}}
                <div class="mt-6 ">
                    <x-input-label for="region" value="{{ __('Region') }}" />
                    <x-text-input
                        id="region"
                        name="region"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('addis abeba') }}"
                        value="{{ $region }}"
                    />
                    <x-input-error :messages="$errors->personalInfoUpdate->get('region')" class="mt-2" />
                </div>

                {{-- date_of_birth --}}
                <div class="mt-6 ">
                    <x-input-label for="dob" value="{{ __('Birth Date') }}" />
                    <x-text-input
                        id="dob"
                        name="dob"
                        type="date"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('addis abeba') }}"
                        value="{{ $dob }}"
                    />
                    <x-input-error :messages="$errors->personalInfoUpdate->get('dob')" class="mt-2" />
                </div>
                
                {{-- license_number --}}
                <div class="mt-6 ">
                    <x-input-label for="license_number" value="{{ __('License Number') }}" />
                    <x-text-input
                        id="license_number"
                        name="license_number"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('addis abeba') }}"
                        value="{{ $license_number }}"
                    />
                    <x-input-error :messages="$errors->personalInfoUpdate->get('license_number')" class="mt-2" />
                </div>

                {{-- emergency_name --}}
                <div class="mt-6 ">
                    <x-input-label for="emergency_name" value="{{ __('Emergency Name') }}" />
                    <x-text-input
                        id="emergency_name"
                        name="emergency_name"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('addis abeba') }}"
                        value="{{ $emergency_name }}"
                    />
                    <x-input-error :messages="$errors->personalInfoUpdate->get('emergency_name')" class="mt-2" />
                </div>

                {{-- emergency_phone --}}
                <div class="mt-6 ">
                    <x-input-label for="emergency_phone" value="{{ __('Emergency Phone') }}" />
                    <x-text-input
                        id="emergency_phone"
                        name="emergency_phone"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('addis abeba') }}"
                        value="{{ $emergency_phone }}"
                    />
                    <x-input-error :messages="$errors->personalInfoUpdate->get('emergency_phone')" class="mt-2" />
                </div>
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