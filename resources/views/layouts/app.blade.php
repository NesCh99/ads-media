<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Streaming | ADS Sports</title>
    <link rel="icon" type="image/x-icon" href="/img/logo.png">
  
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.min.css') }}">
    <script src="{{ asset('/js/stream.js') }}" defer></script>
    <script src="{{ asset('/js/icons.js') }}"></script>
    <script src="{{ asset('/js/main.min.js') }}"></script>
    @yield('css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="sidebar-mini sidebar-collapse theme-dark  sidebar-expanded-on-hover" style="display: none;">
    <x-jet-banner />

    <div class="min-h-screen ">
        @livewire('navigation-menu')
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>



    @livewireScripts
</body>

</html>
