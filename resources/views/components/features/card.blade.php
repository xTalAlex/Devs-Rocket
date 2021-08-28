<div class="w-full lg:w-3/12 px-4 text-center">

    <modal-media 
        clickable-class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
        :images="['/assets/img/error_banner.jpg','/assets/img/andromeda.jpg','/assets/img/no_avatar.png','/assets/img/apple-icon.png','/assets/img/auth_bg.png']"
    >
          @if(isset($icon))
              {{ $icon }}
          @else
              <i class="fas fa-question text-xl"></i>
          @endif
    </modal-media>

    <h5 class="text-xl mt-5 font-semibold text-white">{{ $title }}</h5>

    <p class="mt-2 mb-4 text-gray-500">
      {{ $slot }}
    </p>

</div>