<div class="w-full lg:w-3/12 px-4 text-center mt-12 rounded-lg lg:mt-0">

    <modal-media 
        clickable-class="flex w-full h-64 items-center justify-center mx-auto p-6"
        :elements="{{ $template->elements }}"
    >

    <!-- IMAGE ZOOM -->
      <div class="relative group w-64 h-64 m-3 flex items-center justify-center overflow-hidden shadow-xl rounded border-4 border-gray-400 border-opacity-20 hover:border-opacity-100 ">
       
        <img class="absolute w-full h-full object-center object-cover
              transition-all duration-500 ease-in-out transform group-hover:scale-150" 
          alt="Template {{ $template->title }} Thumbnail" 
          src="{{ $template->thumbnail }}"
        >

        <h1 class="absolute text-2xl font-black text-gray-400 opacity-100 capitalize 
              transition-all duration-500 ease-in-out transform scale-150 group-hover:scale-100">
          {{ $template->title }}
        </h1>

      </div>

    </modal-media>

    <p class="mt-2 mb-4 text-gray-500">
      {{ $template->description }}
    </p>

</div>

{{-- TEMPLATE ICON
  <div class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex mx-auto text-center items-center justify-center">
    <i class="fas h- fa-question text-xl"></i>
  </div> 
--}}