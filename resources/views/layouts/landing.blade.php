<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    {{-- SEO Meta Tags --}}
    <x-seo :meta="$seoMeta ?? []" />
    
    {{-- Structured Data --}}
    <x-structured-data :schema="\App\Services\SeoService::getOrganizationSchema()" />
    @isset($structuredData)
        <x-structured-data :schema="$structuredData" />
    @endisset

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('front-end/images/logo/favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('front-end/images/logo/favicon.svg') }}">

    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front-end/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('front-end/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('front-end/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('front-end/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('front-end/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('front-end/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/style.css') }}">

</head>

<body>

@include('layouts.header')

{{ $slot }}

@include('layouts.footer')


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('front-end/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('front-end/js/popper.min.js') }}"></script>
    <script src="{{ asset('front-end/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('front-end/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front-end/js/aos.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('front-end/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('front-end/js/scrollax.min.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>

    <script src="{{ asset('front-end/js/google-map.js') }}"></script>
    <script src="{{ asset('front-end/js/main.js') }}"></script>


</body>

</html>