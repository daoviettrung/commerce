<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('client/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/style.css') }}" rel="stylesheet">
</head>

<body class="">
    <head id="header">
        @include('layouts.inc.client.header-top')
        @include('layouts.inc.client.header-mid')
        @include('layouts.inc.client.header-bottom')
        @include('layouts.inc.client.slide')
    </head>
    <div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('client/js/jquery.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/js/html5shiv.js') }}"></script>
    <script src="{{ asset('client/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('client/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('client/js/main.js') }}"></script>
    <script src="{{ asset('client/js/price-range.js') }}"></script>
    <script src="{{ asset('client/js/contact.js') }}"></script>
</body>

</html>
