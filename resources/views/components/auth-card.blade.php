<div 
    class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-900"
    style="background-image: url(./assets/img/auth_bg.png); background-size: 100%; background-repeat: no-repeat;"
>
    <div class="mt-16">
        {{ $logo }}
    </div>
    
    <div class="w-full sm:max-w-md mt-6 mb-20 px-6 py-4 ring-green-400 ring-8 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>