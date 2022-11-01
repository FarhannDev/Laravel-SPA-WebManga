<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('/assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @livewireStyles

    @stack('css')
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <x-loader />
        @yield('content')
        @include('layouts.homepage.btn-scrool')
        {{-- @include('layouts.homepage.footer') --}}
    </div>

    @livewireScripts


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('/assets/js/main.js') }}"></script>


    @stack('javascript')

</body>

</html>
