@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre(["titre" => "Etablissement d'une facture", "icone" => "factures.svg"])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @isset($user)

          @include('labo.factures.dest_connu')

        @endisset

        @isset($users)

          @include('labo.factures.dest_inconnu')

        @endisset

      </div>

    </div>

  </div>

@endsection
