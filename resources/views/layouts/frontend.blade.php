<!doctype html>
<html>


<head>
    <link rel="icon" type="image/x-icon" href={{ url('favicon.ico') }}>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link href="{{ asset('/frontend/fa/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/fa/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/fa/css/solid.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <title>
        @yield('title')
    </title>
</head>

<body>
    <div>
        @include('layouts.inc.navbar')
        @yield('content')
    </div>
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap5.bundle.js') }}"></script>
</body>

</html>
