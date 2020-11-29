@extends('layouts.app')

@section('menu')

  @include("extranet.menuExtranet")

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-11 ">


        @include('utilisateurs.utilisateurTitreDemande')

      </div>

    </div>

    <div class="row justify-content-center">


        @if ($demande->signe)

          @include('utilisateurs.utilisateurDemandeAcheveShow')

        @else

          @include('utilisateurs.utilisateurDemandeInacheveShow')

        @endif


    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-11">

        <hr class="divider">
      </div>

      <div class="col-md-11 text-center">

        @retour(['route' => route('routeurPersonnel')])

      </div>

    </div>


  </div>


@endsection
