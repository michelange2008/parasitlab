<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('storage/oeuf.svg')}}" />

    <title>{{ config('app.name', "Parasit'Lab") }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/fixedHeader.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/responsive.jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery-confirm.css')}}">

</head>
<body>

        @yield('menu')

        @yield('content')

        <!-- Scripts -->

        <script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
