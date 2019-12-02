@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">
      <div class="col-md-4 col-sm-4">
<!-- FICHE RESUME DE L ELEVEUR-->

        @include('fragments.eleveurDetail', [
          'demande' => $demande,
          'total_demandes' => $total_demandes,
          'nb_factures_impayees' => $nb_factures_impayees,
        ])
      </div>
<!-- INFORMATIONS SUR L'ANALYSE-->
      <div class="col-md-7 col-sm-8">
        <div class="row">
          <div class="col-md-12">
    <!-- TITRE INFORMATIONS SUR L ANALYSE-->
            @include('fragments.titreCollapse', [
              'titre' => "Informations sur la demande d'analyse",
              'icone' => 'info_blanc.svg',
              'collapse' => "demande",
              'detail' => true,
            ])
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-12">
    <!-- INFORMATIONS SUR L ANALYSE-->
            @include('labo.demandeShow.demandeDetail', ['demande' => $demande, "collapse" => 'demande'])
          </div>
        </div>
<!-- S IL N Y A PAS D ANALYSES ON AFFICHE UN SIMPLE BANDEAU-->
        @if ($demande->date_resultat === null)
          @include('fragments.titreCollapse', [
            'titre' => "Les analyses ne sont pas terminées",
            'icone' => 'pas_fini.svg',
            'collapse' => '',
            'detail' => false,
          ])
<!-- SINON ON AFFICHE LE DETAIL DE CHAQUE ANALYSE-->
        @else
          <!-- DETAIL DE L ANALYSE DE CHAQUE PRELEVEMENT -->
          @include('labo.resultatsAnalyse', ['demande' => $demande])

        @endif

      </div>
    </div>
  </div>

@endsection
