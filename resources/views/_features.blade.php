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

        @if($templates->count())
          @foreach($templates as $template)
            <x-templates.card 
              :template="$template"
            >
            </x-templates.card>
          @endforeach
        @else
            <p class="text-red-500 mb-4">
              Non c'è nessun esempio! Prova a ricaricare la pagina.
            </p>
        @endif

      </div>

    </div>
  </section>