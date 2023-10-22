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

<body class="font-sans antialiased">
@include('layouts.navigation_guest')
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-gray-300 dark:bg-sky-800 shadow text-sky-900 dark:text-sky-300">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
@endif

<!-- Page Content -->
    <main class="w-4/5 mt-6 p-4 mx-auto overflow-hidden
                     bg-white dark:bg-gray-800
                     rounded sm:rounded-lg shadow-md ">
        {{ $slot }}
    </main>
</div>
</body>
</html>
