<!doctype html>
<html>


<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="icon" type="image/x-icon" href={{ url('favicon.ico') }}>
    <meta charset="utf-8">
    <link href="{{ asset('/frontend/fa/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/fa/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/fa/css/solid.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google tag (gtag.js) -->
    @if (config('app.env') == 'production')
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-02TS3T3BB5"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-02TS3T3BB5');
        </script>
    @endif

    <title>
        @yield('title')
    </title>
</head>

<body>
    <div class="">
        @include('layouts.inc.navbar')
        @yield('content')
    </div>
</body>

</html>
