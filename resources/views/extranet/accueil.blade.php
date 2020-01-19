@extends("layouts.app")

@extends("extranet.menuExtranet")

@section('content')

  <main>

    @include('extranet.accueil_carousel')

    <div class="container accueil">

      @include('extranet.accueil_entetes')

      @include('extranet.accueil_labopresentation')

      <hr class="labo-divider">

    </div>



  </main>

@endsection

@section('footer')

  <footer class="container-fluid">

    Ce site est la propriété du FiBL France

  </footer>

@endsection
