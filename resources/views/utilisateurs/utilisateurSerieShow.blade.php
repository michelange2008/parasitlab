@extends('layouts.app')

@section('menu')

  @include("extranet.menuExtranet")

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="d-none d-md-block col-md-4 justify-content-center">

        <div class="col-md-10 alert-bleu-tres-fonce m-auto py-3">

          <img class="img-claire" src="{{ url('storage/img/icones/serie.svg') }}" alt="Série">

          <h4>
            @lang('demandes.serie')
          </h4>

          <p>
            @lang('demandes.serie_def')
          </p>

          <p>
            @lang('demandes.serie_exemple')
          </p>
          {{-- <hr>

          <img src="{!! url('storage/img/icones/'.$serie->anaacte->icone->nom) !!}" alt="{{ $serie->anaacte->nom }}">

          <p class="lead">{{ ucfirst($serie->anaacte->nom) }}</p>

          <p>

            {{$serie->anaacte->detail}}

          </p> --}}

        </div>

      </div>

      <div class="col-md-10 col-lg-8">

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
