<section class="relative py-20">
  
    <x-separator></x-separator>

    <div class="container mx-auto px-4">
      <div class="items-center flex flex-wrap">
        <div class="w-full md:w-4/12 ml-auto mr-auto px-4">

          <img
            alt="Services image"
            class="max-w-full rounded-lg shadow-lg h-0 md:h-full invisible md:visible "
            src="./assets/img/andromeda.jpg"
          />

        </div>

        <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
          <div class="md:pr-12">
            
            <div
              class="text-yellow-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-yellow-300"
            >
              <i class="fas fa-clipboard-list text-xl"></i>
            </div>
            
            <h3 class="text-3xl font-semibold">I nostri servizi</h3>
            
            <p class="mt-4 text-lg leading-relaxed text-gray-600">
              The extension comes with three pre-built pages to help you get
              started faster. You can change the text and images and you're
              good to go.
            </p>

            <ul class="list-none mt-6 transition duration-500 ease-in-out transform lg:hover:-translate-y-1 lg:hover:scale-110 cursor-default">
              
              <x-services.li>
                <x-slot name="icon">
                  <i class="fas fa-fingerprint">
                </x-slot>
                Carefully crafted components
              </x-services.li>

              <x-services.li>
                <x-slot name="icon">
                  <i class="fab fa-html5">
                </x-slot>
                Amazing page examples
              </x-services.li>

              <x-services.li>
                <x-slot name="icon">
                  <i class="far fa-paper-plane">
                </x-slot>
                Dynamic components
              </x-services.li>
                     
            </ul>
          </div>
        </div>
        
      </div>
    </div>
  </section>