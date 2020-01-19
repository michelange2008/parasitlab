<div id="accueilCarousel" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
    <li data-target="#accueilCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#accueilCarousel" data-slide-to="1"></li>
    <li data-target="#accueilCarousel" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="w-100" src="{{ asset('storage/img/brebis.png') }}" alt="brebis">
      <div class="carousel-caption d-none d-md-block bandeau-bleu-tres-fonce text-left">
        <h1 class="">Maîtrisez le parasitisme de votre troupeau !</h1>
        {{-- <p>
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        </p> --}}
        {{-- <a class="btn btn-rouge rounded-0" href="{{ route('analyses') }}">En savoir plus sur les analyses</a> --}}
      </div>
    </div>

    <div class="carousel-item">
      <img class="w-100" src="{{ asset('storage/img/tete_haemonchus.png') }}" alt="brebis">
      <div class="carousel-caption d-none d-md-block bandeau-bleu-tres-fonce">
        <h1>Approfondissez vos connaissances !</h1>
        {{-- <p>
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        </p> --}}
        {{-- <a class="btn btn-rouge rounded-0" href="{{ route('analyses') }}">En savoir plus sur les parasites</a> --}}
      </div>
    </div>

    <div class="carousel-item">
      <img class="w-100" src="{{ asset('storage/img/cheval.png') }}" alt="brebis">
      <div class="carousel-caption d-none d-md-block bandeau-bleu-tres-fonce text-right">
        <h1>Limitez les résistances !</h1>
        {{-- <p>
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        </p> --}}
        {{-- <a class="btn btn-rouge rounded-0" href="{{ route('analyses') }}">En savoir plus sur les résistances</a> --}}
      </div>
    </div>

  </div>

</div>
