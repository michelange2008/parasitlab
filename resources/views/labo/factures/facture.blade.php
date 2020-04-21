@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @include('fragments.flash')

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre([
          'titre' => $facture_completee->user->name ,
          'soustitre' => "- ".__('factures.num_date', ['num' => $facture_completee->id, 'date' => $facture_completee->faite_date]),
          'icone' => 'factures.svg'
        ])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10">

        @include('labo.factures.facture-entete')

      </div>

    </div>


  <div class="row justify-content-center">

    <div class="col-md-10">

      @include('labo.factures.facture_detail')

    </div>

  </div>

  <div class="row justify-content-center">

    <div class="col-md-10">

      @include('fragments.boutonUser', [
        'route' => 'facture.pdf', 'id' => $facture_completee->id,
        'intitule' => __('boutons.show_pdf'),
        'couleur' => 'btn-rouge',
      ])
      <hr class="divider-court">
    </div>

  </div>

  <div class="row justify-content-center my-3">

    <div class="col-md-10 p-3 border">

      @if ($facture_completee->payee)

        @include('labo.factures.suppReglement')

      @else

        @include('labo.factures.reglement')

      @endif

    </div>

  </div>

  <div class="row justify-content-center mb-3">

    <div class="col-md-10 d-flex justify-content-end">

      @retour(['route' => 'factures.index'])

    </div>

  </div>

</div>
@endsection
