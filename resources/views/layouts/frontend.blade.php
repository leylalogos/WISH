<!doctype html>
<html>
    <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="{{ asset ('frontend/css/bootstrap.css')}}">
     <link rel="stylesheet" href="{{ asset ('frontend/css/custom.css')}}">

    </head>
<body>
    <div>
        @include('layouts.inc.navbar')
        @yield('content')
    </div>
    <script src="{{ asset ('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset ('frontend/js/bootstrap5.bundle.js') }}"></script>
</body>
</html>
    
            
    