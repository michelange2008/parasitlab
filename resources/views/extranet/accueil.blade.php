@extends("layouts.app")

@extends("extranet.menuExtranet")

@section('content')

  <main>

    <div class="jumbotron alert-bleu-tres-fonce d-flex flex-row">

      <img src="{{ asset('storage/img/brebis.png') }}" alt="brebis">

      <div class="container">

        <h1 class="display-1">Maîtrisez le parasitisme de votre troupeau !</h1>

        <p>
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        </p>

        <a class="btn btn-rouge rounded-0" href="{{ route('analyses') }}">En savoir plus sur les analyses</a>

      </div>

    </div>

    <div class="row ">

      <div class="col-md-12">



      </div>

    </div>

  </main>

@endsection

@section('footer')

  <footer class="container-fluid">

    Ce site est la propriété du FiBL France

  </footer>

@endsection
