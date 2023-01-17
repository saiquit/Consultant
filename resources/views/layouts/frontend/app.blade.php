<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>XpertGroupBD | @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="site.webmanifest">
    <link rel="icon" type="image/png" href="{{ asset('f/assets/img/favicon.ico') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('f/assets/bundle/libs.css') }}">
    <link rel="stylesheet" href="{{ asset('f/assets/bundle/styles.css') }}">

</head>

<body>
    {!! Helper::displayAlert() !!}
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('f/assets/img/logo/logo.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    @include('layouts.frontend.partials.header')
    <main>
        @yield('content')
        @include('layouts.frontend.partials.footer-form')
        @include('layouts.frontend.partials.contact-modal')
    </main>
    @include('layouts.frontend.partials.footer')
    <!-- JS here -->
    <script src="{{ asset('f/assets/bundle/libs.js') }}"></script>
    <script src="{{ asset('f/assets/bundle/app.js') }}"></script>
</body>

</html>
