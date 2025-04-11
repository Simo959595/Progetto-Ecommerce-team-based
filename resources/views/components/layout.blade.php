<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RiArreda</title>
    <link rel="icon" type="image/png" href="{{ asset('img/Logo.png') }}">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="col-bg {{ Request::is('/') ? 'homepage' : 'internal-page' }}">
    {{-- @if (Route::currentRouteName()=='homepage')
    <x-navbar-home />
        @else --}}
    <x-navbar/>     
    {{-- @endif --}}

    
    {{$slot}}

    
    <x-footer></x-footer>
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>

