<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style> .bg-white{background-color: #1E293B!important}.bg-gray-100{background-color: #0F172A!important}.ads{background-color: #1E293B;border:1px solid #6B7280}</style>
    </head>
    <body>
        <div class="font-sans dark:bg-slate-900   ring-1 ring-slate-900/5 shadow-xl">
            {{ $slot }}
        </div>
    </body>
</html>
