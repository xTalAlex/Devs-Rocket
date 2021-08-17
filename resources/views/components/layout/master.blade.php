<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth;">
    
    <head>
        <x-layout.head/>
    </head>

    <body id="app" class="relative text-gray-800 antialiased min-h-screen">

        <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 ">
            <x-layout.nav/>
        </nav> 

        <main class="relative">
            {{ $slot }}
        </main>

        <footer class="w-full bottom-0 bg-gray-300 pt-8 pb-6" >
            <x-layout.footer/>
        </footer>

        <div class="flex flex-col jusctify-center fixed top-0 right-0 mt-1 md:mt-2 lg:mt-2 mx-4 md:mr-4 z-50"> 
            @if(session()->get('success'))
                <flash-message type="success" message="{{ session()->get('success') }}" ></flash-message>
            @elseif(session()->get('warning'))
                <flash-message type="warning" message="{{ session()->get('warning') }}" ></flash-message>
            @elseif(session()->get('error'))
                <flash-message type="error" message="{{ session()->get('error') }}" ></flash-message>
            @endif
        </div>

    </body>

</html>