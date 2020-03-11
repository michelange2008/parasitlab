<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{'storage/oeuf.svg'}}" />

    <title>Parasit'Lab</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ 'public/css/app.css' }}" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ 'public/css/bootstrap-table.min.css'}}">
    <link rel="stylesheet" href="{{ 'public/css/bootstrap-table-sticky-header.min.css'}}">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ 'css/jquery.dataTables.min.css'}}">
    <link rel="stylesheet" href="{{ 'css/fixedHeader.dataTables.min.css'}}">
    <link rel="stylesheet" href="{{ 'css/responsive.jquery.dataTables.min.css'}}"> --}}
    <link rel="stylesheet" href="{{ 'public/css/jquery-confirm.css'}}">

</head>
  <body>

      @yield('menu')

      @yield('content')

      @yield('footer')

      <!-- Scripts -->

      <script src="{{ 'public/js/app.js' }}" defer></script>

  </body>

</html>
