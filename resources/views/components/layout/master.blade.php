<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth;">
    
    <head>
        <x-layout.head/>
    </head>

    <body>

        <div id="app" class="relative text-gray-800 antialiased min-h-screen">
            <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 ">
                <x-layout.nav/>
            </nav> 

            <main class="relative">
                {{ $slot }}
            </main>

            <footer class="w-full bottom-0 bg-gray-300 pt-8 pb-6" >
                <x-layout.footer/>
            </footer>

            <div class="flex flex-col justify-center fixed top-0 right-0 mt-1 md:mt-2 lg:mt-2 mx-4 md:mr-4 z-50"> 
                @if(session()->get('success'))
                    <flash-message type="success" message="{{ session()->get('success') }}" ></flash-message>
                @elseif(session()->get('warning'))
                    <flash-message type="warning" message="{{ session()->get('warning') }}" ></flash-message>
                @elseif(session()->get('error'))
                    <flash-message type="error" message="{{ session()->get('error') }}" ></flash-message>
                @endif
            </div>
        </div>

        <!--Start of Tawk.to Script-->
            <script type="text/javascript">
                var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                Tawk_API.visitor = {
                    name  : {!! json_encode(auth()->user() ? auth()->user()->name : '' , JSON_HEX_TAG) !!},
                    email : {!! json_encode(auth()->user()? auth()->user()->email : '', JSON_HEX_TAG) !!}
                };
                (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/616349ac86aee40a5735df59/1fhltfj32';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
                })();
            </script>
        <!--End of Tawk.to Script-->
        
    </body>
    
</html>