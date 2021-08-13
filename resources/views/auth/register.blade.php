<x-layout.master>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mt-4 mb-2" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mt-4 text-gray-200 focus-within:text-red-500">
                <x-auth-label for="name" class="block uppercase text-xs font-bold" :value="__('Name')" />

                <x-auth-input id="name" class="block bg-transparent mt-2 w-full focus:ring focus:ring-red-500 text-red-200 focus:bg-red-500" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Last Name -->
            <div class="mt-6 text-gray-200 focus-within:text-yellow-600">
                <x-auth-label for="last_name"  class="block uppercase text-xs font-bold" :value="__('Last Name')" />

                <x-auth-input id="last_name" class="block mt-2 w-full focus:ring focus:ring-yellow-600 text-yellow-200 focus:bg-yellow-600" type="text" name="last_name" :value="old('last_name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-6 text-gray-200 focus-within:text-green-400">
                <x-auth-label for="email" class="block uppercase text-xs font-bold" :value="__('Email')" />

                <x-auth-input id="email" class="block mt-2 w-full focus:ring focus:ring-green-400 text-green-200 focus:bg-green-400" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-6 text-gray-200 focus-within:text-blue-400">
                <x-auth-label for="password" class="block uppercase text-gray-200 text-xs font-bold" :value="__('Password')" />

                <x-auth-input id="password" class="block mt-2 w-full focus:ring focus:ring-blue-400 text-blue-200 focus:bg-blue-400"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-6 text-gray-200 focus-within:text-blue-500">
                <x-auth-label for="password_confirmation" class="block uppercase text-xs font-bold" :value="__('Confirm Password')" />

                <x-auth-input id="password_confirmation" class="block mt-2 w-full focus:ring focus:ring-blue-500 text-blue-300 focus:bg-blue-500"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-6 mb-4">
                <span class="text-gray-200">
                    <a class="underline text-sm hover:text-white" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                <span>
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-layout.master>
