<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/slick.min.js', 'resources/js/bootstrap.bundle.min.js', 'resources/js/bootstrap.min.js', 'resources/js/jqeury.zoom.min.js','resources/js/jqeury.min.js', 'resources/js/nouislider.min.js', 'resources/js/jquery.zoom.min.js', 'resources/js/jquery.min.js', 'resources/css/app.css', 'resources/css/bootstrap.min.css', 'resources/css/font-awesome.min.css', 'resources/css/multizoom.css', 'resources/css/slick.css', 'resources/css/slick-theme.css', 'resources/css/nouislider.min.css'])

</head>

<body>

    <div id="app">


        <!-- NAVIGATION -->
        @if (Auth::user())
            @include('partials.nav')
        @else
            @include('partials.out-nav')
        @endif
        <!-- /NAVIGATION -->

        <main class="py-4">

            @yield('content')
            @yield('show-categories')
            @yield('create-categories')
            @yield('create-sub-categories')
            @yield('create-products')
            @yield('show-product')
        </main>
    </div>


    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.zoom.js') }}"></script>
    
</body>


</html>
