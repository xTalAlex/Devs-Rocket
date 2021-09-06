<x-layout.master>
<div class="min-h-screen flex flex-col">
<section class="relative block h-96">

    <div
        class="absolute top-0 w-full h-full bg-center bg-cover"
        style='background-image: url("https://images.pexels.com/photos/270348/pexels-photo-270348.jpeg?cs=srgb&dl=pexels-pixabay-270348.jpg&fm=jpg");'
    >
        <span
        id="blackOverlay"
        class="w-full h-full absolute opacity-50 bg-black"
        ></span>
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
    
</section>

<section class="relative h-auto flex-grow py-16 bg-gray-300">
<div class="container mx-auto px-4">
    <div
    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64"
    >
        <div class="px-6">

            <div class="flex flex-wrap justify-center">
            <!-- Avatar -->
                <div
                    class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center relative"
                >
                    <img alt="Avatar"
                        class="shadow-2xl bg-white rounded-full h-36 w-36 align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 object-cover ring-4 ring-white"
                        src="{{ $user->avatar }}"
                    />
                </div>
                <!-- End Avatar -->

                <div
                    class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"
                >
                    <div class="flex items-center py-6 px-3 mt-24 sm:mt-0">
                        
                        @if(auth()->user() && auth()->user()->is($user))
                            @if($user->isDeveloper())
                            <a  href="/admin" target="_blank"
                                class="bg-red-600 hover:bg-red-700 active:bg-red-800 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 sm:mr-2 mb-1"
                                type="button"
                                style="transition: all 0.15s ease 0s;"
                            >
                                Admin Panel
                            </a>
                            @endif

                            <modal-profile-edit :user="{{ $user->load('socials') }}" :socials="{{ $socials }}"></modal-profile-edit>
                        @endif

                    </div>
                    
                </div>

                <div class="w-full lg:w-4/12 px-4 lg:order-1">
                    <div class="flex justify-center py-4 pt-4 lg:pt-8">
                    <div class="mr-4 p-3 text-center">
                        <span
                        class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                        >Reclutato Il</span>
                        <span class="text-sm text-gray-500">{{ $user->created_at->format('j F Y') }}</span>
                    </div>
                    
                    </div>
                </div>
            </div>

            <div class="text-center mt-4 lg:mt-6">
                <h3
                    class="text-4xl font-semibold leading-normal mb-2 text-gray-800"
                >
                    {{ $user->full_name }}
                </h3>
                <div
                    class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold lowercase"
                >
                    <tooltip-top 
                        value="{{ $user->email_verified_at ? 'Email verificata il '.$user->email_verified_at->format('d/m/y') : 'Email non verificata.'}}"
                    >
                        <i
                        class="fas fa-envelope mr-2 text-lg opacity-90
                                @if($user->email_verified_at)
                                text-green-500 
                                @else
                                text-gray-500
                                @endif
                            "
                        ></i>
                    </tooltip-top>
                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>

                </div>

                @if($user->role)
                <div class="mb-2 text-gray-700 mt-10">
                    <i class="fas fa-briefcase mr-2 text-lg text-yellow-600 opacity-80"></i
                    >{{ $user->role->description }}
                </div>
                @else
                <div class="mb-2 text-gray-700 mt-10">
                    <i class="fas fa-user-alt mr-2 text-lg text-gray-500 opacity-80"></i
                    >Ospite
                </div>    
                @endif

            </div>
            <div class="mt-10 py-10 border-t border-gray-300 text-center">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full lg:w-9/12 px-4">
                        <div class="flex w-full justify-center items-center mx-auto italic">
                        @if($user->biography)
                            <q class="text-md text-gray-700 text-center px-5">
                                    {{ $user->biography }}
                            </q>
                        @else
                            <p class="text-lg font-light leading-relaxed mb-4 text-gray-400 ">
                                Nessuna informazione
                            </p>
                        @endif
                    </div>

                    <div class="flex mt-8 mx-auto justify-center items-center">
                        @foreach($user->socials as $social)
                            <social-link :social="{{ $social }}"></social-link>
                        @endforeach
                    </div>
                    <!--
                    <a href="#pablo" class="font-normal text-pink-500"
                        >Show more</a
                    >
                    -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
</div>
</x-layout.master>

