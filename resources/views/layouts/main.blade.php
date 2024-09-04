<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    @yield('head')
    @stack('head')
</head>
<body style="background-color:#2c2e2eb7">
    @include('layouts.navbar.index')
    <div class="container">

        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sweetAlert2.js') }}"></script>
    @yield('javascript')
    @yield('js')
    @stack('javascript')
</body>

</html>
