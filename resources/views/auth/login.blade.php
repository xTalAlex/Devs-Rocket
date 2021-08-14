<x-layout.master>
<x-auth-card>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}">
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
                    data-client_id="239666970121-ndbj5jbouevql1lglth17cqkff4029f8.apps.googleusercontent.com"
                    data-login_uri="http://localhost:8000/register"
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

        <!-- Email Address -->
        <div class="mt-4 text-gray-200 focus-within:text-yellow-600">
            <x-auth-label for="email" :value="__('Email')" class="block uppercase text-xs font-bold" />

            <x-auth-input id="email" class="block mt-2 w-full focus:ring focus:ring-yellow-600 text-yellow-200 focus:bg-yellow-600" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <!-- Password -->
        <div class="mt-6 text-gray-200 focus-within:text-green-400">
            <x-auth-label for="password" class="block uppercase text-xs font-bold" :value="__('Password')" />

            <x-auth-input id="password" class="block mt-2 w-full focus:ring focus:ring-green-400 text-green-200 focus:bg-green-400"
                type="password"
                name="password"
                required autocomplete="current-password" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4 text-gray-200 focus-within:text-blue-400">
                <input id="remember_me" type="checkbox" class="rounded border-2 bg-transparent text-blue-500 shadow-sm focus:border-transparent focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-900" name="remember">
            <label for="remember_me" class="inline-flex items-center">    
                <span class="ml-2 text-xs font-bold uppercase">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">

            <div>
                <a class="underline text-sm text-white mr-2" href="{{ route('register') }}">
                    {{ __('Not registered?') }}
                </a>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-white" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <x-button class="ml-3">
                {{ __('Log in') }}
            </x-button>
        </div>
    </form>
</x-auth-card>
</x-layout.master>
