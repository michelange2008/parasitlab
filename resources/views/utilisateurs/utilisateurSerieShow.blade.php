@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">



    <div class="row my-3">

      <div class="d-none d-md-block col-md-4 bd-sidebar justify-content-center">

        <div class="col-md-10 alert-bleu-tres-fonce m-auto py-3">

          <img class="img-claire" src="{!! asset('storage/img/icones/serie.svg') !!}" alt="Série">

          <h4>
            Série
          </h4>

          <p>
            Une série est une succession d'analyses sur les mêmes animaux
            ou lots d'animaux, visant à évaluer une évolution de l'infestation parasitaire.
          </p>
          <p>
            Les suivis de campagne et les tests de résistance sont des exemples de séries.
          </p>
          <hr>

          <img src="{!! asset('storage/img/icones')."/".$serie->anapack->icone->nom !!}" alt="{{ $serie->anapack->nom }}">

          <p class="lead">{{ ucfirst($serie->anapack->nom) }}</p>

          <p>

            {{$serie->anapack->detail}}

          </p>

        </div>

      </div>

      <div class="col-md-8 col-lg-6">

        @include('utilisateurs.utilisateurTitreSerie')


        @if ($serie->acheve)

          @if ($serieInfos->identique)

                @include('labo.serieShow.detailIdentique')

          @else

                @include('labo.serieShow.detailDifferent')

          @endif

        @else

          @include('labo.serieShow.serieInacheve')

        @endif


        @retour()

      </div>

    </div>

  </div>



@endsection
