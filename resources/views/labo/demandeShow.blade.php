@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">
    <div class="row my-3 justify-content-center">
      <div class="col-md-8">
        @include('fragments.titreUtilisateur', [
          'user_name' => $demande->anapack->nom." (".$demande->identification.")",
          'icone' => $demande->anapack->icone->nom,
          'collapse' => "demande",
        ])
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        @include('fragments.demandeDetail' ['demande' => $demande])
      </div>
    </div>
  </div>

@endsection
