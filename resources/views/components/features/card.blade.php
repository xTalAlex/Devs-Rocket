<div class="w-full lg:w-3/12 px-4 text-center">

    <div
      class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
    >
        @if(isset($icon))
            {{ $icon }}
        @else
            <i class="fas fa-question text-xl"></i>
        @endif
    </div>

    <h5 class="text-xl mt-5 font-semibold text-white">{{ $title }}</h5>

    <p class="mt-2 mb-4 text-gray-500">
      {{ $slot }}
    </p>

</div>