<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Dashboard | XpertGroupBD</title>

    <!-- Site favicon -->
    <link rel="icon" type="image/png" href="{{ asset('f/assets/img/favicon.ico') }}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('b/vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('b/vendors/styles/icon-font.min.css') }}">
    @stack('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('b/vendors/styles/style.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body>
    {{-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo"><img src="/b/vendors/images/deskapp-logo.svg" alt=""></div>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                Loading...
            </div>
        </div>
    </div> --}}
    @include('layouts.backend.partials.header')
    @include('layouts.backend.partials.sidebar')
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">

        <div class="pd-ltr-20">

            @yield('content')
        </div>
    </div>
    <!-- js -->
    <script src="{{ asset('b/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('b/vendors/scripts/script.js') }}"></script>
    <script src="{{ asset('b/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('b/vendors/scripts/layout-settings.js') }}"></script>
    @stack('js')
    <script>
        function sendMarkRequest(id = null) {
            return $.ajax("{{ route('admin.mark') }}", {
                method: 'POST',
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id
                }
            });
        }
        $('#mark-all').click(function() {
            console.log('clicked');
            let request = sendMarkRequest();
            request.done(() => {
                console.log('worked');
            })
        });
        @if ($errors->any())
            $('.main-container').prepend('<div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>');
        @endif
    </script>
</body>

</html>
