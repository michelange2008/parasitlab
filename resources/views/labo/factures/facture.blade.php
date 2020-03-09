@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre([
          'titre' => $facture_completee->user->name ,
          'soustitre' => "(facture n°".$facture_completee->id." du ".$facture_completee->faite_date.")",
          'icone' => 'factures.svg'
        ])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10">

        @include('labo.factures.facture-entete')

      </div>

    </div>

  </div>

  <div class="row justify-content-center">

    <div class="col-md-10">

      @include('labo.factures.facture_detail')

    </div>

  </div>

  <div class="row justify-content-center">

    <div class="col-md-10">

      @include('fragments.boutonUser', ['route' => 'facture.pdf', 'id' => $facture_completee->id, 'intitule' => 'afficher le pdf'])

    </div>

  </div>

@endsection
