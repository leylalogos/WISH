<!doctype html>
<html lang="{{ config('app.locale') }}" dir="rtl">

<head>
    <meta name="color-scheme" content="only light">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="manifest" href="{{ url('wish.webmanifest.json') }}" type="application/manifest+json" />
    <meta name="application-name" content="wish">
    <meta name="description" content="Make your wish list">
    <meta name="keywords" content="wish, birthday, celeberate, iran">
    <meta name="author" content="Leyla Sabouri">
    <meta name="creator" content="Xnor team">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta charset="utf-8">
    @stack('meta-tags')
    <link rel="icon" type="image/x-icon" href={{ url('favicon.ico') }}>
    <link href="{{ asset('/frontend/fa/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/fa/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/fa/css/solid.css') }}" rel="stylesheet">
    <script>
        base_url = '{{ url('/') }}';
    </script>
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
        @if (session()->has('message.success'))
            <div class="alert alert-success wish-notification" role="alert">
                {{ session('message.success') }}
            </div>
        @endif
        @if (session()->has('message.error'))
            <div class="alert alert-danger wish-notification" role="alert">
                {{ session('message.error') }}
            </div>
        @endif

        @yield('content')
    </div>
    @include('layouts.inc.footer')
</body>

</html>
