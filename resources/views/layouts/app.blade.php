<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{url('storage/oeuf.svg')}}" />

    <title>Parasit'Lab - Appréhender la complexité du vivant</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{url('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/bootstrap-table.min.css')}}">
    <link rel="stylesheet" href="{{url('css/bootstrap-table-sticky-header.min.css')}}">
    <link rel="stylesheet" href="{{url('css/jquery-confirm.css')}}">

</head>
  <body>

      @yield('menu')

      @yield('content')

      @yield('footer')

      <!-- Scripts -->

      <script src="{{url('js/app.js')}}" defer></script>

  </body>

</html>
