@extends("layouts.app")

@extends("extranet.menuExtranet")

@section('content')

  <main>

    @include('cookieConsent::index')

    @include('extranet.accueil.accueil_carousel')

    <div class="container-fluid text-center">

      @include('extranet.accueil.accueil_entetes')

      @include('extranet.accueil.accueil_labopresentation')

      <hr class="labo-divider">

      @include('extranet.accueil.accueil_pastilles')

      <hr class="labo-divider">

    </div>

  </main>

@endsection

@section('footer')

  <footer class="container-fluid">

    Ce site est la propriété du FiBL France

  </footer>

@endsection
