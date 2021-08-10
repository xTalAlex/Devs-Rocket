<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <x-layout.head/>
    </head>

    <body id="app" class="text-gray-800 antialiased">

        <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 ">
            <x-layout.nav/>
        </nav> 

        <main>
            {{ $slot }}
        </main>

        <footer class="relative bg-gray-300 pt-8 pb-6" >
            <x-layout.footer/>
        </footer>

    </body>

</html>