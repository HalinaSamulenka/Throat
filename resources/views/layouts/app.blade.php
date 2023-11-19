<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 h-screen justify-between flex flex-col ">

<header class="bg-white dark:bg-gray-800 shadow md:fixed md:top-0 w-full z-10">

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex flex-row">
        <a href="{{ route('static.home') }}" class="grow">
            <h2 class="font-semibold leading-tight grow text-xl text-gray-800 dark:text-gray-200">
                <img src="{{ URL::to('/') }}/images/icons/uvula.png" alt="" class="h-8 inline-flex">
                {{ __('THROAT') }}
            </h2>
        </a>
        <p class="text-sm text-gray-300 py-1 hidden md:visible">Giving meaning to the net</p>
    </div>

    @include('layouts.navigation')
</header>


<!-- Page Content -->
<main class="w-full lg:max-w-6xl mx-auto p-2 md:p-8 mt-2 md:mt-32 grow ">
    @if(isset($$header))
        {{ $header }}
    @endif
    {{ $slot }}
</main>

<footer class="h-24 mt-8 p-4 md:p-8 bg-gray-800 text-gray-400 dark:bg-gray-900 dark:text-gray-300 text-sm flex
flex-col md:flex-row justify-center md:items-center md:justify-between gap-1 md:gap-4">

    <div class="text-center md:text-left">
        <p>&copy; Copyright 2023 Halina Karamova, All rights reserved.</p>
    </div>

    @if(env('APP_ENV')=='local')
        <div class="text-center md:text-right">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    @endif

    <div class="text-center md:text-right text-xs">
        <a href="https://www.flaticon.com/free-icons/uvula" title="uvula icons">
            Uvula icons created by Freepik - Flaticon
        </a>
    </div>
</footer>

</body>
</html>
