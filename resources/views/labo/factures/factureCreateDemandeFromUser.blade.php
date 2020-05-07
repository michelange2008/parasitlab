@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-lg-6 col-md-8">

        @titre(["titre" => __('titres.facture_create'), "icone" => "factures.svg"])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-lg-6 col-md-8">

        <div class="">

          <p class="h4 mb-3">{{ $user->name }}</p>

        </div>

        <div class="border-left pl-3">

          <p class="lead">{{ ucfirst(__($demande->anaacte->anatype->nom)) }}</p>

          <p>{{ ucfirst($demande->anaacte->nom) }}</p>

          <p>{{ \Carbon\Carbon::parse($demande->date_reception)->isoFormat('LL') }}</p>

        </div>

        <form action="{{ route('factures.store') }}" method="post">

          @csrf

          <div class="">

            <input type="hidden" name="destinataire" value="{{ $user->id }}">

            <input type="hidden" name="demande_{{ $demande->id }}" value="{{ $demande->id }}">

            <div class="custom-control custom-checkbox">

              <input id="kit" type="checkbox" class="custom-control-input" name="kit">

              <label class="custom-control-label" for="kit">@lang('factures.ajout_kit')</label>

            </div>

            @enregistreAnnule()

          </div>

        </form>

      </div>

    </div>

  </div>

@endsection
