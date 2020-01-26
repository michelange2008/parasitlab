@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-8 col-lg-6">

        @include('utilisateurs.eleveurs.titreEleveurDemande')

      </div>

    </div>


    <div class="row justify-content-center">

      <div class="col-md-8 col-lg-6">


        @if (!$demande->signe)

          @include('utilisateurs.eleveurs.eleveurDemandeInacheveShow')

        @else

          @include('utilisateurs.eleveurs.eleveurDemandeAcheveShow')

        @endif

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-8 col-lg-6">

        @if ($demande->signe)

          @include('fragments.boutonResultatPdf')

        @endif

        @include('fragments.boutonUser', [
          'route' => 'eleveur',
          'id' => '',
          'couleur' => 'btn-secondary',
          'intitule' => 'Retour',
        ])

      </div>


    </div>

    <div class="row">

      <hr>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-8 col-lg-6 border-top pt-4 lead">

        <img class="img-40" src="{!! asset('storage/img/icones/question2.svg') !!}" alt="question">

        Une question ? Un problème ? N'hésitez-pas

        @include('fragments.boutonContact')

      </div>

    </div>

  </div>

@endsection
