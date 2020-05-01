@extends('layouts.app')

@section('menu')

  @include('extranet.menuExtranet')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-end">

      <div class="col-md-3">

        @include('utilisateurs.pagePerso')

        @include('utilisateurs.boutonRetourAnalyses')

      </div>

      <div class="col-md-9">

        @titre(['titre' => __('titres.utilisateur_mafacture'), 'icone' => 'factures.svg'])

        <div class="row">

          <div class="col-md-8">

            @include('labo.factures.facture_entete')

            @include('labo.factures.facture_detail')

            <hr class="divider">

            @include('utilisateurs.utilisateurReglement')

            <hr class="divider">

            @boutonUser([
              'route' => 'routeurFacturePdf',
              'id' => $elementDeFacture->facture->id,
              'intitule' => 'show_pdf',
              'couleur' => 'btn-rouge',
              'fa' => 'fas fa-file-pdf',
            ])

          </div>

        </div>

      </div>

    </div>

  </div>

  @endsection
