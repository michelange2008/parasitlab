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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" 
    integrity="sha512-0V10q+b1Iumz67sVDL8LPFZEEavo6H/nBSyghr7mm9JEQkOAm91HNoZQRvQdjennBb/oEuW+8oZHVpIKq+d25g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
    crossorigin="anonymous">

  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">

</head>
  <body>

      @yield('menu')

      @yield('content')

      @yield('footer')

      <!-- Scripts -->
      <script
			  src="https://code.jquery.com/jquery-3.7.0.min.js"
			  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
			  crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" 
          integrity="sha512-zP5W8791v1A6FToy+viyoyUUyjCzx+4K8XZCKzW28AnCoepPNIXecxh9mvGuy3Rt78OzEsU+VCvcObwAMvBAww==" 
          crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" 
          integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" 
          crossorigin="anonymous"></script>

        <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/locale/bootstrap-table-fr-FR.min.js" 
          integrity="sha512-IoRDFiMGuP0Pc2yj3u4tlItgqpX5kXxZunqFcqLnSN1WsO9J1uQ3wfw8BRhZHv8V2iMhv5rZaphPqu9XW/OgZQ==" 
          crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="{{ url('js/bootstrap-table-accent-neutralise.min.js') }}"></script>
        
        <script src="{{url('js/app.js')}}"></script>

      @yield('scripts')
      @yield('css')

      @yield('script_inputImage')
      @yield('css_inputImage')


  </body>

</html>
