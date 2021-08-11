<x-layout.master>
 
<div
  class="relative pt-16 pb-32 flex content-center items-center justify-center"
  style="min-height: 75vh;"
>
  <div
    class="absolute top-0 w-full h-full bg-center bg-cover"
    style='background-image: url("https://images.pexels.com/photos/270348/pexels-photo-270348.jpeg?cs=srgb&dl=pexels-pixabay-270348.jpg&fm=jpg");'
  >
    <span
      id="blackOverlay"
      class="w-full h-full absolute opacity-75 bg-black"
    ></span>
  </div>
  <div class="container relative mx-auto transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
    <div class="items-center flex flex-wrap">
      <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
        <div class="pr-12">
          <h1 class="text-white font-semibold text-5xl">
            Realizziamo il tuo sito web.
          </h1>
          <p class="mt-4 text-lg text-gray-300">
            Vuoi che la tua idea di sito web prenda forma? Sei nel posto giusto.
            Descrivici quello che vorresti e il nostro team ti guiderà verso la soluzione più adatta. 
          </p>
        </div>
      </div>
    </div>
  </div>
  <div
    class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
    style="height: 70px;"
  >
    <svg
      class="absolute bottom-0 overflow-hidden"
      xmlns="http://www.w3.org/2000/svg"
      preserveAspectRatio="none"
      version="1.1"
      viewBox="0 0 2560 100"
      x="0"
      y="0"
    >
      <polygon
        class="text-gray-300 fill-current"
        points="2560 0 2560 100 0 100"
      ></polygon>
    </svg>
  </div>
</div>

  @include('_about_us')

  @include('_services')

  @include('_team')

  @include('_features')

  @include('_mailbox')

</x-layout.master>