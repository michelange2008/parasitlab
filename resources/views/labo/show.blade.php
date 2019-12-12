{{-- ISSU DE  demandeController@show et SerieController@show
AFFICHE UN RESULTAT D'ANALYSE D'UN ELEVEUR: SOIT UNE DEMANDE SIMPLE SOIT UNE SERIE
 --}}
@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-4">

        {{-- INFORMATIONS SUR L'ELEVEUR --}}

        @eleveurDetail()

      </div>

{{-- RESULTATS D'ANALYSE --}}
      <div class="col-md-8">

        {{-- SI L'ANALYSE EST UNE SERIE --}}
        @isset($serie)

            @serieShow()

        @endisset

        {{-- SI L'ANALYSE EST UNE DEMANDE --}}
        @isset($demande)

            @demandeShow()

        @endisset

      </div>

    </div>

  </div>

@endsection
