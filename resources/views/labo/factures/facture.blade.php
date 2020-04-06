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

      @include('fragments.boutonUser', [
        'route' => 'facture.pdf', 'id' => $facture_completee->id,
        'intitule' => __('boutons.show_pdf'),
        'couleur' => 'btn-rouge',
      ])

    </div>

  </div>

  <div class="row justify-content-center my-3">

    <div class="col-md-10 p-3 border">

      <h4>Paiement</h4>
<?php // TODO: comprendre pourquoi si on met la traduction ça fout le bazar dans les balises ?>
      <form class="" action="{{ route('reglement.store') }}" method="post">

        @csrf

        <input type="hidden" name="facture_id" value="{{ $facture_completee->id }}">

        <div class="row flex-row">

          <div class=" col form-group">

            <label for="modereglement">Mode de réglement</label>

            <select class="form-control" name="modereglement_id">

              @foreach ($modereglements as $modereglements)

                <option value="{{ $modereglements->id }}">{{ $modereglements->nom }}</option>

              @endforeach

            </select>

          </div>

          <div class="col form-group">

            <label for="payee_date">date de paiement</label>

            <input class="form-control" type="date" name="payee_date" value="{{ Carbon\Carbon::now()->toDateString() }}">

          </div>

        </div>

        @enregistreAnnule()

      </form>

    </div>

  </div>

@endsection
