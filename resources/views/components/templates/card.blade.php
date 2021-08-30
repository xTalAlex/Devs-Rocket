<div class="w-full lg:w-3/12 px-4 text-center">

    <modal-media 
        clickable-class="flex w-full h-64  items-center justify-center mx-auto p-8"
        :elements="{{ $template->elements }}"
    >

      <img class="object-cover w-80 h-full" src="{{ $template->thumbnail }}">

    </modal-media>

    <h5 class="text-xl mt-5 font-semibold text-white">
      {{ $template->title }}
    </h5>

    <p class="mt-2 mb-4 text-gray-500">
      {{ $template->description }}
    </p>

</div>

{{-- TEMPLATE ICON
  <div class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex mx-auto text-center items-center justify-center">
    <i class="fas h- fa-question text-xl"></i>
  </div> 
--}}