<section id="mailbox" class="relative block py-24 lg:pt-0 bg-gray-900">
    <div class="container mx-auto px-4 mt-4">
      <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
        <div class="w-full lg:w-6/12 px-4">
          <form method="POST" action="{{ route('mail.store') }}" enctype="multipart/form-data"   
            class="group"            
            ref="form" 
            @submit.prevent 
          > 
          @csrf      
          <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300"
          >
            <div class="flex-auto p-5 lg:p-10">
              
              <h4 class="text-2xl font-semibold">Vuoi farci una richiesta o una domanda?</h4>
              <p class="leading-relaxed mt-1 mb-4 text-gray-600">
                Scrivici e ti risponderemo entro 24 ore.
              </p>

              <div class="relative w-full mb-3 mt-8">
                <x-label
                  class="block uppercase text-gray-700 text-xs font-bold mb-2"
                  for="name"
                  >Nome
                  @error('name')
                    <span class="alert alert-danger text-red-500 text-xs font-semibold">{{ $message }}</span>
                  @enderror
                </x-label>
                <input
                  type="text"
                  class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full
                    @error('name') border-2 border-red-500 @enderror"
                  name="name"
                  placeholder="Il tuo nome"
                  value="{{auth()->user() ? auth()->user()->full_name : ( old('name') ? old('name') : null ) }}"
                  style="transition: all 0.15s ease 0s;"
                  required
                  @error('name') autofocus @enderror
                />
              </div>

              <div class="relative w-full mb-3">
                <x-label
                  class="block uppercase text-gray-700 text-xs font-bold mb-2"
                  for="email"
                  >Email 
                  @error('email')
                    <span class="alert alert-danger text-red-500 text-xs font-semibold">{{ $message }}</span>
                  @enderror
                </x-label>
                <input
                  type="email"
                  class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full
                    @error('email') border-2 border-red-500 @enderror"
                  name="email"
                  placeholder="Email"
                  value="{{auth()->user() ? auth()->user()->email : ( old('email') ? old('email') : null ) }}"
                  style="transition: all 0.15s ease 0s;"
                  required
                  @error('email') autofocus @enderror
                />
              </div>

              <div class="relative w-full mb-3">
                <x-label
                  class="block uppercase text-gray-700 text-xs font-bold mb-2"
                  for="message"
                  >Messaggio 
                  @error('message')
                    <span class="alert alert-danger text-red-500 text-xs font-semibold">{{ $message }}</span>
                  @enderror
                </x-label>
                <textarea
                  rows="4"
                  cols="80"
                  maxlength="1000"
                  class="resize-none border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full
                    @error('message') border-2 border-red-500 @enderror"
                  name="message"
                  placeholder="Lascia un messaggio..."
                  required
                  @error('message') autofocus @enderror
                  @error('attachment') autofocus @enderror
                >{{ old('message') ? old('message') : null }}</textarea>
              </div>

              <div class="relative w-full mb-3">
                <x-label
                  class="block uppercase text-gray-700 text-xs font-bold mb-2"
                  for="attachment"
                  >Allegato <span class="text-xs text-gray-500">(Opzionale) </span>
                  @error('attachment')
                    <span class="alert alert-danger text-red-500 text-xs font-semibold">{{ $message }}</span>
                  @enderror
                </x-label>              
                <div class="flex w-64 items-center justify-center bg-gray-900  @error('attachment') border-2 border-red-500 @enderror">
                  <file-uploader
                    :accept="'image/jpeg,image/png,.pdf,.zip'"
                    :name="'attachment'"
                    :label="'Allega un file'"
                  ></file-uploader>
                </div> 
                <span class="block text-xs text-gray-500">Formati accettati: .jpeg,.png,.pdf,.zip (massimo 10MB)</span>
              </div>

              <div class="text-center mt-6">
                <button
                  class="animate-pulse group-hover:animate-none bg-gray-900 hover:text-white text-gray-200 active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                  type="submit"
                  style="transition: all 0.15s ease 0s;"
                  @click.once="$refs.form.submit()"
                >
                  Invia
                </button>
              </div>

            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
</section>