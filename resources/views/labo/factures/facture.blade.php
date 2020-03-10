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

  <div class="row justify-content-center my-3">

    <div class="col-md-10 border">

      <h4>Paiement de la facture</h4>

      <form class="" action="{{ route('facture.paiement') }}" method="post">

        @csrf

        <div class=" col-md-4 form-group">

          <label for="reglement">Mode de réglement</label>

          <select class="form-control" name="reglement">

            @foreach ($reglements as $reglement)

              <option value="{{ $reglement->id }}">{{ $reglement->nom }}</option>

            @endforeach

          </select>

        </div>

      </form>

    </div>

  </div>

@endsection
