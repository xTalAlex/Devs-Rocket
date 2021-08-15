<div
  class="container px-4 mx-auto flex flex-wrap items-center justify-between"
>
  
  <!-- Logo -->
  <div
    class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
  >
    <a
      class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white hover:text-gray-400"
      href="{{ route('home') }}"
      >Rocket Developers</a
    ><button
      class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
      type="button"
      onclick="toggleNavbar('example-collapse-navbar')"
    >
      <i class="text-white hover:text-gray-300 fas fa-bars"></i>
    </button>
  </div>
  <!-- End Logo -->

  <!-- Icons -->
  <div
    class="lg:flex flex-grow items-center bg-black bg-opacity-90 lg:bg-transparent lg:shadow-none hidden"
    id="example-collapse-navbar"
  >

    <!-- Left Icon -->
    <ul class="flex flex-col lg:flex-row list-none lg:mr-auto">
      <li class="flex items-center">
        <a
          class="lg:text-white hover:text-gray-300 text-gray-400 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="https://www.creative-tim.com/learning-lab/tailwind-starter-kit#/landing"
          target="_blank"
          ><i
            class="lg:text-gray-300 text-gray-400 far fa-file-alt text-lg leading-lg mr-2"
          ></i>
          <span class="inline-block lg:text-gray-300 text-gray-400 hover:text-gray-300 lg:hover:text-gray-500">Docs</span>
        </a>
      </li>
    </ul>
    <!-- End Left Icon -->

    <!-- Right Icons -->
    <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
      <li class="flex items-center">
        <a
          class="lg:text-white hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="https://www.youtube.com/channel/RocketDevelopers"
          target="_blank"
          ><i
            class="text-gray-400 lg:text-gray-300 lg:hover:text-gray-500 fab fa-youtube text-lg leading-lg "
          ></i
          ><span class="lg:hidden inline-block ml-2 text-gray-400 hover:text-gray-300">Youtube</span></a
        >
      </li>
      <li class="flex items-center">
        <a
          class="lg:text-white hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="https://discord.gg/UrUMbT2q"
          target="_blank"
          ><i
            class="text-gray-400 lg:text-gray-300 lg:hover:text-gray-500 fab fa-discord text-lg leading-lg "
          ></i
          ><span class="lg:hidden inline-block ml-2 text-gray-400 hover:text-gray-300">Discord</span></a
        >
      </li>
      <li class="flex items-center">
        <a
          class="lg:text-white hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="https://github.com/xTalAlex/Rocket-Developers"
          target="_blank"
          ><i
            class="text-gray-400 lg:text-gray-300 lg:hover:text-gray-500 fab fa-github text-lg leading-lg "
          ></i
          ><span class="lg:hidden inline-block ml-2 text-gray-400 hover:text-gray-300">GitHub</span></a
        >
      </li>
      
      
      <li class="flex items-center justify-end lg:justify-auto mx-4 p-1 lg:mx-0 lg:p-0">
        @auth

          <a
            class="bg-white hover:bg-gray-300 active:bg-gray-400 text-gray-800 hover:opacity-80 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
            type="button"
            style="transition: all 0.15s ease 0s;"
            href="{{ route('profile') }}"
          >
            <i class="fas fa-user-circle"></i> {{ auth()->user()->name }}
          </a>

          <form method="POST" action="{{ route('logout') }}">
          @csrf
            <a
              class="bg-white hover:bg-gray-300 active:bg-gray-400 text-gray-800 hover:opacity-80 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
              type="button"
              style="transition: all 0.15s ease 0s;"
              href="{{ route('logout') }}"
              onclick="event.preventDefault(); this.closest('form').submit();"
            >
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>
          </form>

        @else
          <a
            class="bbg-white hover:bg-gray-300 active:bg-gray-400 text-gray-800 hover:opacity-80 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
            type="button"
            style="transition: all 0.15s ease 0s;"
            href="{{ route('login') }}"
          >
            <i class="fas fa-sign-in-alt"></i> Login
          </a>

          <a
            class="bg-white hover:bg-gray-300 active:bg-gray-400 text-gray-800 hover:opacity-800 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
            type="button"
            style="transition: all 0.15s ease 0s;"
            href="{{ route('register') }}"
          >
            Register
          </a>
        @endauth
      </li>

    </ul>
    <!-- End Right Icons -->

  </div>
  <!-- End Icons -->
  
</div>