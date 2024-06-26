<x-guest-layout>
    <x-authentication-card class="max-w-screen-sm md:w-4/5 lg:w-3/5">
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif
        @php
            //Sort out Demo status
            $demo = env('DEMO_MODE', false);
            if($demo || env('APP_ENV') == 'local'){
                $emailvalue = old('email') ? old('email') : 'demo@demo.com';
                $passwordvalue = old('password') ? old('password') : 'password';
            }else{
                $emailvalue = old('email');
                $passwordvalue = old('password');
            }
        @endphp

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block w-full mt-1 text-black" type="email" name="email" :value="$emailvalue" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block w-full mt-1 text-black" type="password" name="password" :value="$passwordvalue" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" class="checkbox-black" />
                    <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <!-- TEMP Fix for the button -->
                    <button type="submit" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ms-4 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        {{ __('Log in') }}
                    </button>
                    <!-- Conflict with Mary UI / Jetstream button -->
{{--                <x-button class="ms-4">--}}
{{--                    {{ __('Log in') }}--}}
{{--                </x-button>--}}
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
