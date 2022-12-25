<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('f/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('b/src/styles/style.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    <section class="container">
        <div class="text-center mt-4 mb-4">
            <img src="{{ asset('f/assets/img/logo/logo.png') }}" alt="logo" srcset="">
            <div class="section-tittle">
                <h2 class="text-bold">@yield('subject')</h2>
            </div>
        </div>
        <div class="card card-body text-justify">
            <h4 class="pb-3">@yield('to')</h4>
            @yield('body')
        </div>
        <script src="{{ asset('f/assets/js/bootstrap.min.js') }}"></script>
    </section>
</body>

</html>
