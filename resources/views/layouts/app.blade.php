<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Parts Log App</title>
        <link rel="icon" type="image/x-icon" href="{{url('/brand-logo.svg')}}">
         
        {{--  font-family --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        {{-- tailwind connection --}}
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body>
        @include('components.navbar')
        @include('components.hero')

        <div class="h-[220rem]">
            @yield('content')
        </div>
    </body>
</html>
