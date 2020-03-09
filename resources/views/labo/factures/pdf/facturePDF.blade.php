@extends('layouts.facturesPDF')

@section('content')

  <div style="margin-left:380px; border: 1px solid black; padding-left:20px">

    <p class="adresseNom">{{ $facture_completee->user->name }}</p>
    <p class="adresse">{{ $facture_completee->user->eleveur->address_1 }}</p>
    <p class="adresse">{{ $facture_completee->user->eleveur->address_2 }}</p>
    <p class="adresse">{{ $facture_completee->user->eleveur->cp }} {{ $facture_completee->user->eleveur->commune }}</p>

  </div>

  @include('labo.factures.facture_detail')

@endsection
