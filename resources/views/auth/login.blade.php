<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>
    <div class="flex justify-center items-center w-full  ">
        <div class="w-full sm:max-w-md flex justify-center items-center flex-col ">
            <a href="/">
                <x-application-logo class="h-16  fill-current text-gray-500" />
            </a>
            <form class="w-full  mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" method="POST"
                  action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                  required autofocus autocomplete="username"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')"/>

                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password"/>

                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                               class="rounded border-gray-300 text-primary shadow-sm focus:ring-primary"
                               name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>


                </div>

                <div class="flex items-center justify-between mt-4">
                        <a class="underline text-sm text-primary hover:text-primary rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                           href="/user/password-reset/request">
                            {{ __('Forgot your password?') }}
                        </a>


                </div>
                <div class="flex items-center justify-center mt-4 w-full gap-3">

                    <x-primary-button class=" w-full flex justify-center items-center">
                        {{ __('Log in') }}
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
