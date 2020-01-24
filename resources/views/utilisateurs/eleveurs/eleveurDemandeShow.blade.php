@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-8 col-lg-6">

        @include('utilisateurs.eleveurs.titreEleveurDemande')

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-8 col-lg-6 lead">

        Demande d'analyse reçue le {{ $demande->date_reception }}

      </div>


    </div>

    <div class="row justify-content-center">

      <div class="col-md-8 col-lg-6">


        @if (!$demande->acheve)

          @include('utilisateurs.eleveurs.eleveurDemandeInacheveShow')

        @else

          @include('utilisateurs.eleveurs.eleveurDemandeAcheveShow')

        @endif

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-8 col-lg-6">

        @include('fragments.boutonResultatPdf')

        @include('fragments.boutonAnnule')

      </div>


    </div>

    <div class="row">

      <hr>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-8 col-lg-6 d-flex justify-content-between">

        Une question ? Un problème ? N'hésitez-pas

        @include('fragments.boutonContact')

      </div>

    </div>

  </div>

@endsection
