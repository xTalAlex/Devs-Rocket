<section class="pb-20 relative block bg-gray-900">

    <x-separator color="gray-900"></x-separator>

    <div class="container mx-auto px-4 pt-8 lg:pt-24 lg:pb-64">

      <div class="flex flex-wrap text-center justify-center">
        <div class="w-full lg:w-6/12 px-4">
          <h2 class="text-4xl font-semibold text-white">I Nostri Kit</h2>
          <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-500">
            Se sei indeciso, dai un'occhiata a questi esempi di lavoro.
            Possiamo modificare ogni particolare per soddisfare le tue esigenze.
          </p>
        </div>
      </div>

      <div class="flex flex-wrap mt-12 justify-center">

        <x-features.card>
          <x-slot name="title">
            Excelent Services
          </x-slot>
          <x-slot name="icon">
            <i class="fas fa-lightbulb text-xl "></i>
          </x-slot>
          Some quick example text to build on the card title and make up the bulk of the card's content.
        </x-features.card>

        <x-features.card>
          <x-slot name="title">
            Grow your market
        </x-slot>
            Some quick example text to build on the card title and make up the bulk of the card's content.
        </x-features.card>

        <x-features.card>
          <x-slot name="title">
            Launch time
          </x-slot>
          <x-slot name="icon">
            <i class="fas fa-lightbulb text-xl"></i>
          </x-slot>
            Some quick example text to build on the card title and make up the bulk of the card's content.
        </x-features.card>

      </div>

    </div>
  </section>