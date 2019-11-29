@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">
    <div class="row my-3 justify-content-center">
      <div class="col-md-8">
        @include('fragments.titreCollapse', [
          'titre' => $demande->anapack->nom,
          'icone' => $demande->anapack->icone->nom,
          'collapse' => "demande"
        ])
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        @include('labo.demandeShow.demandeDetail', ['demande' => $demande, "collapse" => 'demande'])
      </div>
    </div>
    @foreach ($demande->prelevements as $prelevement)
      <div class="row my-3 justify-content-center">
        <div class="col-md-8">
          @include('fragments.titreCollapse', [
            'titre' => $prelevement->identification,
            'icone' => $prelevement->analyse->icone->nom,
            'collapse' => 'prelevement'.$prelevement->id,
          ])
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          @include('fragments.analyseDetail', ['prelevement' => $prelevement, "collapse" => 'prelevement'.$prelevement->id])
        </div>
      </div>
    @endforeach
  </div>

@endsection
