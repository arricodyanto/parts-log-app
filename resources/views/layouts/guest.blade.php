<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Login - Parts Log') }}</title>
        {{-- ngrok connection --}}
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

        {{--  font-family --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 px-4">
            <div>
                <a href="/" class="flex flex-col items-center hover:brightness-110">
                    <img src="{{asset('/brand-logo.svg')}}" alt="Parts Log Logo" class="w-24">
                    <p class="brand-text text-lg">{{env('APP_NAME')}}</p>
                </a>
            </div>

            <div class="w-full xs:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden xs:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>