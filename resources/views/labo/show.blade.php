@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-4 sm-4">

        {{-- INFORMATIONS SUR L'ELEVEUR --}}

        @include('fragments.eleveurDetail', [
          'demande' => $demande,
          'total_demandes' => $total_demandes,
          'nb_factures_impayees' => $nb_factures_impayees,
        ])

      </div>

    </div>

  </div>




{{-- RESULTATS D'ANALYSE --}}

  @if ($type === 'serie')

    @include('labo.serieShow', [
      'type' => 'serie',
      'serie' => $serie,
      'titres' => $serieTableau['titres'],
      'valeurs' => $serieTableau['valeurs'],
      'identique' => $identique,
    ])

  @elseif ($type === 'demande')

  @endif

@endsection
