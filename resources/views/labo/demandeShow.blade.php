{{-- ISSU DE  demandeController@show
AFFICHE UN RESULTAT D'ANALYSE D'UN ELEVEUR:
--}}
@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row">

      @include('fragments.breadcrumb', [
        'liste' => [
          "Accueil" => 'laboratoire',
          "Demandes" => 'demandes.index'
        ],
        'nom' => isset($demande->anaacte->anatype->nom) ? ucfirst($demande->anaacte->anatype->nom) : ucfirst($serie->anapack->nom)
      ])

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-11">

        @titre([
          'titre' => $demande->user->name.'&nbsp;: '.$demande->anaacte->anatype->abbreviation.' - '.$demande->anaacte->nom,
          'icone' => $demande->espece->icone->nom,
        ])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-4">

        <!-- INFORMATIONS SUR L ANALYSE: SI TERMINEE NE S'AFFICHE PAS PAR DEFAUT - SINON AFFICHEE-->
        @include('labo.demandeShow.demandeDetail')

      </div>

      {{-- RESULTATS D'ANALYSE --}}
      <div class="col-md-7">

        @include('fragments.flash')

        {{-- Cas où une demande d'analyse a été saisie sans que les prélèvements correspondants aient été saisis --}}
        @if ($demande->prelevements->count() == 0)

          @include('labo.demandeSansPrelevement', ['demande_id' => $demande->id])

        @else

          @include('labo.demandeShow.boutonsSaisie')

            <div class="card-body">

              {{-- DETAIL DE L ANALYSE DE CHAQUE PRELEVEMENT --}}
              @include('labo.resultatsAnalyse')

            </div>

          </div>

        @endif

      </div>

    </div>

    <div class="row my-3"> {{-- Juste une ligne pour donner un peu d'espace au bas de page --}}

    </div>

  </div>

@endsection
