<x-guest-layout>
    <div class="flex justify-center items-center w-full">
        <div class="w-full sm:max-w-md flex justify-center items-center flex-col ">
            <a href="/">
                <x-application-logo class="h-16  fill-current text-gray-500"/>
            </a>
            <form method="POST" action="{{ route('register') }}"
                  class="w-full  mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                  required placeholder="e.g. Mohammed"
                                  autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                  placeholder="e.g. Mohammed@gmail.com"
                                  required autocomplete="username"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <div class="mt-4">
                    <x-input-label for="phone_number" :value="__('Phone Number')"/>
                    <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                                  placeholder="e.g. 0921234567"
                                  :value="old('phone_number')" required autocomplete="phone_number"/>
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')"/>

                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password"/>

                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                  type="password"
                                  name="password_confirmation" required autocomplete="new-password"/>

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                </div>

                <div class="block mt-4 ">
                    <label for="terms_and_conditions" class="inline-flex items-center">
                        <input id="terms_and_conditions" type="checkbox"
                               class="rounded border-primary text-primary shadow-sm focus:ring-primary"
                               name="terms_and_conditions">
                        <a href="{{route('terms-and-conditions')}}"
                           class="ms-2 text-sm text-blue-500 hover:underline">{{ __('I agree to the terms and conditions') }}</a>
                    </label>
                    <x-input-error :messages="$errors->get('terms_and_conditions')" class="mt-2"/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                       href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4   overflow-hidden sm:rounded-lg hidden md:block" id="Layer_2" data-name="Layer 2"
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3710 3710">


            <img src="{{asset('landing/img/13.png')}}">

        </div>

    </div>
</x-guest-layout>
