<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>@lang('titres.site_title')</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name=”description” content="Situé dans la Drôme, Parasit'lab est un service du FiBL France et propose des analyses parasitologiques pour les ruminants, les équidés et les porc">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="og:type" content="website">
  <meta name="og:titre" content="Un laboratoire de parasitologie">
  <meta name="og:image" content="{{ url('storage/img/oeuf-simple.svg') }}">
  <meta name="og:url" content="https://parasitlab.org">

  <link rel="icon" href="{{url('storage/favicon.png')}}" />
  <!-- Styles -->
  <link href="{{url('css/app.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{url('css/bootstrap-table.min.css')}}">
  <link rel="stylesheet" href="{{url('css/jquery-confirm.min.css')}}">

</head>
  <body>

      @yield('menu')

      @yield('content')

      @yield('footer')

      <!-- Scripts -->
      <script src="{{url('js/app.js')}}"></script>

      @yield('scripts')

  </body>

</html>
