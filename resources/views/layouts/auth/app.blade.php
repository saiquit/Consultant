<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>XpertgroupBD</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="site.webmanifest">
    <link rel="icon" type="image/png" href="{{ asset('f/assets/img/favicon.ico') }}">


    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('b/vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('b/vendors/styles/icon-font.min.css') }}">
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

<body class="{{ Route::currentRouteName() }}-page">
    @yield('content')
    <!-- js -->
    <script src="{{ asset('b/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('b/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('b/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('b/vendors/scripts/layout-settings.js') }}"></script>
</body>

</html>
