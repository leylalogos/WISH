<!doctype html>
<html>


<head>
    <link rel="icon" type="image/x-icon" href={{ url('favicon.ico') }}>
    <meta charset="utf-8">
    <link href="{{ asset('/frontend/fa/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/fa/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/fa/css/solid.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>
        @yield('title')
    </title>
</head>

<body>
    <div>
        @include('layouts.inc.navbar')
        @yield('content')
    </div>
</body>

</html>
