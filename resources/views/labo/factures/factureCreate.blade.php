@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre(["titre" => __('titres.facture_create'), "icone" => "factures.svg"])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        <form action="{{ route('factures.store') }}" method="post">

          @csrf

            <h2>{{ $user->name }}</h2>

            <input class="form-control" type="hidden" name="destinataire" value="{{ $user->id }}">

            <div class="row d-flex flex-row my-3">

              <div class="col">

                @include('labo.factures.demandesAFacturer')

              </div>

              <div class="col">

                @include('labo.factures.ActesAFacturer')

              </div>

            </div>

            @enregistreAnnule(['nomBouton' => 'boutons.facturer'])

        </form>

      </div>

    </div>

  </div>

@endsection
