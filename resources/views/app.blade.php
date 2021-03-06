<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">


        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>


    </head>
    <body class="font-sans antialiased bg-slate-900 overflow-x-hidden relative ">
        @inertia
        @env ('local')
        {{-- <script src="{{ env('APP_URL') }}/browser-sync/browser-sync-client.js"></script> --}}
        @endenv
        {{-- <script src="http://localhost:6001/socket.io/socket.io.js"></script> --}}
    </body>
</html>
