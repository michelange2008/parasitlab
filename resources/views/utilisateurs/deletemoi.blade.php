@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">


    <div class="row">

      @include('fragments.flash')

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-xl-8">

        @titre(['titre' => 'Suppression de mon compte', 'icone' => 'exclusions.svg'])

      </div>

    </div>

    <div class="row">

      <div class="col-md-10 offset-md-1 col-xl-8 offset-xl-2">

        <h3>Souhaitez-vous réellement supprimer votre compte sur le site <i>parasitlab.org</i>&nbsp;?</h3>

        <hr class="divider">

        <p class="lead">N'oubliez pas d'enregistrer au préalable toutes vos analyses, car vous n'y auraient plus accès après la suppression de votre compte.</p>


      </div>

    </div>

    <div class="row">

      <div class="col-md-10 offset-md-1 col-xl-8 offset-xl-2">

        <form action="{{ route('routeur.jemedelete', $user->id) }}" method="get">

          @csrf

          @enregistreAnnule(["couleur" => 'btn-rouge', 'nomBouton' => 'Oui je veux supprimer mon compte'])

        </form>

      </div>

    </div>

  </div>

@endsection
