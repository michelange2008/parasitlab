<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="storage/oeuf.svg" />

    <title>Parasit'Lab</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
  <body>

    <div id="header">
      @include('labo.resultats.pdf.enteteResultats')
    </div>

    @yield('content')

    <div id="footer">
      <span class="page">Page </span>
      <span class="adresseFibl"> ----> Une question, un problème... contactez-nous: www.parasitlab.org ou 0475202020</span>
    </div>


  </body>
</html>
