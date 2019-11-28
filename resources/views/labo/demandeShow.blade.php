@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">
    <div class="row my-3 justify-content-center">
      <div class="col-md-8">
        @include('fragments.titreUtilisateur', [
          'user_name' => $demande->anapack->nom,
          'icone' => $demande->anapack->icone->nom,
          'collapse' => "demande"
        ])
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        @include('fragments.demandeDetail', ['demande' => $demande, "collapse" => 'demande'])
      </div>
    </div>
  </div>

@endsection
