<div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
    <div class="px-6 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
      <img
        alt="..."
        src="./assets/img/giovanni.jpg"
        class="shadow-lg rounded-full max-w-full max-h-full mx-auto object-cover
          "
        style="width: 120px; height: 120px;"
      />
      <div class="pt-6 text-center">
        <h5 class="text-xl font-bold">Giovanni</h5>
        <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
          Web Developer
        </p>
        <div class="mt-6">
          @foreach(auth()->user()->socials as $social)
            <a
              href="{{ $social->pivot->link }}"
              class="bg-pink-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
              type="button"
            >
              <i class="fab fa-dribbble"></i>
            </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>