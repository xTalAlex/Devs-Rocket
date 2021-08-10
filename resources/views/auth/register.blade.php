<x-layout.master>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-labelregister for="name" class="block uppercase text-gray-200 hover:text-red-500 text-xs font-bold mb-2" :value="__('Name')" />

                <x-inputregister id="name" class="block mt-1 w-full focus:ring focus:ring-red-500 text-red-200 focus:bg-red-500" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <x-labelregister for="last_name"  class="block uppercase text-gray-200 hover:text-yellow-600   text-xs font-bold mb-2" :value="__('Last Name')" />

                <x-inputregister id="last_name" class="block mt-1 w-full focus:ring focus:ring-yellow-600 text-yellow-200 focus:bg-yellow-600" type="text" name="last_name" :value="old('last_name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-labelregister for="email" class="block uppercase text-gray-200 hover:text-green-400 text-xs font-bold mb-2" :value="__('Email')" />

                <x-inputregister id="email" class="block mt-1 w-full focus:ring focus:ring-green-400 text-green-200 focus:bg-green-400" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-labelregister for="password" class="block uppercase text-gray-200 hover:text-blue-400 text-xs font-bold mb-2" :value="__('Password')" />

                <x-inputregister id="password" class="block mt-1 w-full focus:ring focus:ring-blue-400 text-blue-200 focus:bg-blue-400"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-labelregister for="password_confirmation" class="block uppercase text-gray-200 hover:text-blue-500 text-xs font-bold mb-2" :value="__('Confirm Password')" />

                <x-inputregister id="password_confirmation" class="block mt-1 w-full focus:ring focus:ring-blue-500 text-blue-300 focus:bg-blue-500"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
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
