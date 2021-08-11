<div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
  <div class="px-6 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
    <a href="{{ route('profile',$developer) }}">
      <img
        alt="..."
        src="{{ $developer->avatar }}"
        class="shadow-lg rounded-full max-w-full max-h-full mx-auto object-cover hover:ring-2 hover:ring-gray-900  hover:ring-opacity-60"
        style="width: 120px; height: 120px;"
      />
    </a>
    <div class="pt-6 text-center">
      <a href="{{ route('profile',$developer) }}">
        <h5 class="text-xl font-bold">{{ $developer->name }}</h5>
      </a>
      <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
          {{ $developer->role->description }}
      </p>
      <div class="mt-6">
        @foreach($developer->socials as $social)
          <x-social-link :social="$social" ></x-social-link>
        @endforeach
      </div>
    </div>
  </div>
</div>