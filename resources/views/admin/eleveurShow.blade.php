@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container">
    <div class="row mt-3 justify-content-center">
      <div class="col-md-11">
        @include('fragments.titreCollapse', [
          "titre" => $user->name,
          "icone" => $user->usertype->icone->nom,
          "collapse" => "modifier"])
      </div>

      <div class="col-md-11">
        @include('fragments.breadcrumb', [
          "liste" => [
          "Accueil" => "laboratoire",
          "Eleveurs" => "eleveurAdmin.index"
         ]
       ])
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-11">
        @include('fragments.eleveurModifier', [
          "user" => $user,
          "vetos" => $vetos,
          "pays" => $pays,
          "collapse" => "modifier",
        ])
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-11">
        @include('labo.demandesTableau', ['demandes' => $demandes, 'intitules' => $intitules])
      </div>
    </div>

  </div>

@endsection
