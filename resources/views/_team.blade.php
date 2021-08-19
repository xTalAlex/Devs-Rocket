<section class="pt-8 pb-8 lg:pb-48">
    <div class="container mx-auto px-4">

      <div class="flex flex-wrap justify-center text-center mb-10 lg:mb-24">
        <div class="w-full lg:w-6/12 px-4">
          <h2 class="text-4xl font-semibold">Il Nostro Team</h2>
          <p class="text-lg leading-relaxed m-4 text-gray-600">
            Queste sono le persone che collaboreranno per sviluppare il tuo sito web.
          </p>
        </div>
      </div>

      <div class="flex flex-wrap items-start justify-center">

        @foreach($developers as $developer)
            <x-developer-card :developer="$developer"></x-developer-card>
        @endforeach

      </div>

    </div>
  </section>