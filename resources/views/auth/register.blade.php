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

            <div class="rounded-t mb-0 px-6 py-6">

                <div class="text-center mb-3">
                  <h6 class="text-white text-xs font-bold">
                    <x-auth-label for="name" class="block uppercase text-xs font-bold" :value="__('Sign in with')" />
                  </h6>
                </div>

                <div class="btn-wrapper text-center flex justify-center">

                {{--
                  <button
                    class="bg-white active:bg-gray-100 text-gray-800 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs"
                    type="button"
                    style="transition: all 0.15s ease 0s;"
                  >
                    <img
                      alt="..."
                      class="w-5 mr-1"
                      src="./assets/img/github.svg"
                    />Github
                  </button> 
                --}}

                <div id="g_id_onload"
                    data-client_id="{{ config('services.google.client') }}"
                    data-login_uri="{{ route('register') }}"
                    data-_token="{{ csrf_token() }}"
                    data-auto_prompt="false"
                >
                </div>
                <div class="g_id_signin"
                    data-type="standard"
                    data-size="large"
                    data-theme="filled_black"
                    data-text="signup_with"
                    data-shape="pill"
                    data-logo_alignment="left"
                > 
                </div>

                </div>
                <hr class="mt-6 border-b-1 border-gray-400" />
            </div>

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
