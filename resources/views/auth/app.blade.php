<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title ?? env('APP_NAME') }} </title>

    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">

    @stack('customCss')
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        <!-- Sidebar -->



        <!-- Navbar -->


        @yield('content')


    </div>

    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>

</body>

</html>
