<div
  class="container px-4 mx-auto flex flex-wrap items-center justify-between"
>
  
  <!-- Logo -->
  <div
    class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
  >
    <a
      class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
      href="{{ route('home') }}"
      >Rocket Developers</a
    ><button
      class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
      type="button"
      onclick="toggleNavbar('example-collapse-navbar')"
    >
      <i class="text-white fas fa-bars"></i>
    </button>
  </div>
  <!-- End Logo -->

  <!-- Icons -->
  <div
    class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
    id="example-collapse-navbar"
  >

    <!-- Left Icon -->
    <ul class="flex flex-col lg:flex-row list-none mr-auto">
      <li class="flex items-center">
        <a
          class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="https://www.creative-tim.com/learning-lab/tailwind-starter-kit#/landing"
          target="_blank"
          ><i
            class="lg:text-gray-300 text-gray-500 far fa-file-alt text-lg leading-lg mr-2"
          ></i>
          Docs</a
        >
      </li>
    </ul>
    <!-- End Left Icon -->

    <!-- Right Icons -->
    <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
      <li class="flex items-center">
        <a
          class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="https://www.facebook.com/talale93"
          target="_blank"
          ><i
            class="lg:text-gray-300 text-gray-500 fab fa-facebook text-lg leading-lg "
          ></i
          ><span class="lg:hidden inline-block ml-2">Share</span></a
        >
      </li>
      <li class="flex items-center">
        <a
          class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="https://www.instagram.com/xtalale93x/"
          target="_blank"
          ><i
            class="lg:text-gray-300 text-gray-500 fab fa-instagram text-lg leading-lg "
          ></i
          ><span class="lg:hidden inline-block ml-2">Tag</span></a
        >
      </li>
      <li class="flex items-center">
        <a
          class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="https://www.youtube.com/channel/UCQo0FqOqqA1sEddLUrZBGMQ"
          target="_blank"
          ><i
            class="lg:text-gray-300 text-gray-500 fab fa-youtube text-lg leading-lg "
          ></i
          ><span class="lg:hidden inline-block ml-2">Watch</span></a
        >
      </li>
      <li class="flex items-center">
        <a
          class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="https://soundcloud.com/talale93"
          target="_blank"
          ><i
            class="lg:text-gray-300 text-gray-500 fab fa-soundcloud text-lg leading-lg "
          ></i
          ><span class="lg:hidden inline-block ml-2">Listen</span></a
        >
      </li>
      <li class="flex items-center">
        <a
          class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="https://github.com/xTalAlex"
          target="_blank"
          ><i
            class="lg:text-gray-300 text-gray-500 fab fa-github text-lg leading-lg "
          ></i
          ><span class="lg:hidden inline-block ml-2">Star</span></a
        >
      </li>
      
      <li class="flex items-center">
        @auth

          <a
            class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
            type="button"
            style="transition: all 0.15s ease 0s;"
            href="{{ route('profile') }}"
          >
            <i class="fas fa-user-circle"></i> {{ auth()->user()->name }}
          </a>

          <form method="POST" action="{{ route('logout') }}">
          @csrf
            <a
              class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
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
            class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
            type="button"
            style="transition: all 0.15s ease 0s;"
            href="{{ route('login') }}"
          >
            <i class="fas fa-sign-in-alt"></i> Login
          </a>

          <a
            class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
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