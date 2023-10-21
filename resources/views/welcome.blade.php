<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">

        <!-- Tailwind CSS -->
        <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    </head>


    <body class="antialiased bg-gray-100 dark:bg-gray-900">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center dark:bg-dots-lighter selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
            <div class="">
                @auth
                <div class="flex flex-col items-center">
                    <img src="{{ asset('images/icon.png') }}" alt="Icon" class="mb-2 w-60 h-60 rounded-3xl">
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-red-500 rounded-sm">Dashboard</a>
                </div>
                @else
                <div class="flex flex-col items-center">
                    <img src="{{ asset('images/icon.png') }}" alt="Icon" class="mb-2  w-60 h-60 rounded-3xl">
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-red-500 rounded-sm">Log in</a>
                </div>
                @if (Route::has('register'))
                <div class="flex flex-col items-center ml-4">
                    <img src="{{ asset('images/icon.png') }}" alt="Icon" class="mb-2  w-60 h-60 rounded-3xl">
                    <a href="{{ route('register') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-red-500 rounded-sm">Register</a>
                </div>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </body>
</html>

