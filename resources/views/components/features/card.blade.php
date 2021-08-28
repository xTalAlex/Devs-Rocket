<div class="w-full lg:w-3/12 px-4 text-center">

    <modal-media 
        clickable-class="flex object-cover w-80 h-80 mx-auto p-8"
        :images="['/assets/img/error_banner.jpg','/assets/img/andromeda.jpg','/assets/img/no_avatar.png','/assets/img/apple-icon.png','/assets/img/auth_bg.png']"
    >
          @if(isset($thumbnail))
              {{ $thumbnail }}
          @else
            <div class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex mx-auto text-center items-center justify-center">
              <i class="fas h- fa-question text-xl"></i>
            </div>
          @endif
    </modal-media>

    <h5 class="text-xl mt-5 font-semibold text-white">{{ $title }}</h5>

    <p class="mt-2 mb-4 text-gray-500">
      {{ $slot }}
    </p>

</div>