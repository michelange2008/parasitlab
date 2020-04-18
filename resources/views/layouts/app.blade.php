<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name=”description” content="Situé dans la drôme, Parasit'lab est un service du FiBL France et propose des analyses parasitologiques pour les ruminants, les équidés et les porc">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="og:type" content="website">
    <meta name="og:titre" content="Un laboratoire de parasitologie">
    <meta name="og:image" content="{{ url('storage/img/oeuf-simple.svg') }}">
    <meta name="og:url" content="https://parasitlab.org">

    <link rel="icon" href="{{url('storage/favicon.png')}}" />

    <title>@lang('titres.site_title')</title>
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}

    <!-- Styles -->
    <link href="{{url('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/bootstrap-table.min.css')}}">
    {{-- <link rel="stylesheet" href="{{url('css/bootstrap-table-sticky-header.min.css')}}"> --}}
    <link rel="stylesheet" href="{{url('css/jquery-confirm.css')}}">

</head>
  <body>

      @yield('menu')

      @yield('content')

      @yield('footer')

      <!-- Scripts -->

      <script src="{{url('js/app.js')}}" defer></script>
      {{-- <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script> --}}

  </body>

</html>
