@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    @if (session('message'))
      <div class="row my-3 justify-content-center">

        <div class="col-md-10 col-lg-8">

          {{session('message')}}

        </div>

      </div>
    @endif

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-lg-8">

        @titre(['titre' => "Ajout d'un acte à un client", 'icone' => 'ajouter.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-lg-8">

        <form class="" action="{{ route('acte.store') }}" method="post">

          @csrf

          @include('labo.actes.acteNomClient')

          @include('labo.actes.acteListeAnaactes')

          @enregistreAnnule(['nomBouton' => 'Enregistrer'])

        </form>

      </div>

    </div>

  </div>

@endsection
