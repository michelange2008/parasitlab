@extends('layouts.app')

@section('menu')

  @include("extranet.menuExtranet")

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-8 ">

        @include('utilisateurs.utilisateurTitreDemande')

      </div>

    </div>


    <div class="row justify-content-center">

      <div class="col-md-8">


        @if (!$demande->signe)

          @include('utilisateurs.utilisateurDemandeInacheveShow')

        @else

          @include('utilisateurs.utilisateurDemandeAcheveShow')

        @endif

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-8">

        @if ($demande->signe)

          @bouton([
            'type' => 'route',
            'route' => 'resultatPdf',
            'id' => $demande->id,
            'couleur' => 'btn-rouge',
            'fa' => 'fas fa-file-pdf',
            'intitule' => 'boutons.show_pdf',
          ])

        @endif

        @retour(['url' => url('/personnel')])

      </div>


    </div>

    <div class="row">

      <hr>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-8 border-top mb-5 pt-4 lead">

        <img class="img-40" src="{!! url('storage/img/icones/question2.svg') !!}" alt="question">

        @lang('commun.question_probleme')

        @include('fragments.boutonContact')

      </div>

    </div>

  </div>


@endsection
