<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Adilisha') }}</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('front-end/images/logo/favicon.svg') }}">

    <link rel="icon" href="{{ asset('images/logo/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        id="main-font-link">
    <link rel="stylesheet" href="{{ asset('admin/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/fonts/material.css') }}">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('admin/css/style-preset.css') }}">

</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    @include('layouts.navigation')
    @include('layouts.aside')


    <div class="pc-container">
        <div class="pc-content">
            {{ $slot }}
        </div>
    </div>


    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
            <div class="row">
                <div class="col-sm my-1">
                   
                    <p class="m-0">{{ now()->year }} &copy; {{ config('app.name', 'Adilisha') }}</p>
                </div>
               
            </div>
        </div>
    </footer>


    <script src="{{ asset('admin/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/dashboard-default.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('admin/js/pcoded.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/feather.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeo5GpG9fDgfz5xWsyhZPJfX2kwQ2vI5DkRtZB1z9+nJoZ+n" crossorigin="anonymous">
    </script>


    <script>
        layout_change('light');
    </script>

    <script>
        change_box_container('false');
    </script>



    <script>
        layout_rtl_change('false');
    </script>


    <script>
        preset_change("preset-1");
    </script>


    <script>
        font_change("Public-Sans");
    </script>

    @stack('scripts')

</body>

</html>
