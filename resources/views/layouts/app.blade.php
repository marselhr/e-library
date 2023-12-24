<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title ?? env('APP_NAME') }} </title>

    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}">

    @stack('customCss')
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div class="berhasil" data-berhasil="{{ ucWords(Session::get('success')) }}"></div>
    <div class="gagal" data-gagal="{{ ucWords(Session::get('error')) }}"></div>
    <div class="warning" data-warning="{{ ucWords(Session::get('warning')) }}"></div>
    <div id="app">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <div id="main" class='layout-navbar navbar-fixed'>

            <!-- Navbar -->

            @include('layouts.navbar')
            <div id="main-content">

                @yield('content')


            </div>

            @include('layouts.footer')
        </div>
    </div>

    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    @include('generals._sweetalert')

    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>




    <!-- Need: Apexcharts -->
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/dashboard.js') }}"></script>

    <script>
        // If you want to use tooltips in your project, we suggest initializing them globally
        // instead of a "per-page" level.
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        }, false);
    </script>
    @stack('customJs')

</body>

</html>
