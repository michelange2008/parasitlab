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

          <div id="demande" class="card" acheve="{{ $demande->acheve }}" signe="{{ $demande->signe }}" envoye="{{ $demande->envoye }}" >

            <div class="card-header">

              <div class="btn-group" role="group" aria-label="modif-signature-envoi">


                @include('labo.demandeShow.saisie')

                @include('labo.demandeShow.clotureSaisie')

                @if ($demande->acheve)

                  @include('labo.demandeShow.signature')

                  @include('labo.demandeShow.envoi')

                @endif

              </div>

            </div>

            <div class="card-body">

              {{-- DETAIL DE L ANALYSE DE CHAQUE PRELEVEMENT --}}
              @include('labo.resultatsAnalyse')

            </div>

            <div id="affiche_pdf" class="m-4" style="display:none">

              @bouton([
              'type' => 'route',
              'route' => 'routeurResultatsPdf',
              'id' => $demande->id,
              'couleur' => "btn-rouge",
              'fa' => 'fas fa-file-pdf',
              'intitule' => __('boutons.show_pdf'),
              'target' => '_blank',
              ])

            </div>

          </div>

        @endif

      </div>

    </div>

    <div class="row my-3"> {{-- Juste une ligne pour donner un peu d'espace au bas de page --}}

    </div>

  </div>

@endsection
