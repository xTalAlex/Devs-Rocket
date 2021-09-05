<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#000000" />

        <title>@yield('title')</title>
        <link rel="shortcut icon" href="./assets/img/favicon.ico" />
        <link
        rel="apple-touch-icon"
        sizes="76x76"
        href="./assets/img/apple-icon.png"
        />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Tailwind CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    </head>

    <body class="bg-gray-400">
        <div class="w-full h-screen flex items-end justify-center mx-auto bg-error-banner bg-no-repeat bg-center bg-fit">
            <h1 class="relative flex text-7xl mb-64  ">
                @yield('code') |
                @yield('message')
            </h1>
        </div>
    </body>

</html>
