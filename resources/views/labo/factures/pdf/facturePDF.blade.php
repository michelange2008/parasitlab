@extends('layouts.facturesPDF')

@section('content')

  <div style="margin-left:280px; border: 1px solid black; padding-left:20px">

    <p class="adresse font-weight-bold mt-1">{{ $elementDeFacture->facture->user->name }}</p>
    <p class="adresse">{{ $elementDeFacture->facture->user->eleveur->address_1 }} - {{ $elementDeFacture->facture->user->eleveur->address_2 }}</p>
    <p class="adresse mb-1">{{ $elementDeFacture->facture->user->eleveur->cp }} {{ $elementDeFacture->facture->user->eleveur->commune }}</p>

  </div>

  <p class="font-weight-bold lead">Facture n°{{ $elementDeFacture->facture->id }} du {{ Carbon\Carbon::parse($elementDeFacture->facture->faite_date)->isoFormat('LL') }}</p>

  @foreach ($elementDeFacture->demandes as $demande)

    <p class="pl-3 color-bleu font-weight-bold">{{ ucfirst($demande->anaacte->anatype->nom) }} du {{ Carbon\Carbon::parse($demande->date_reception)->isoFormat('LL') }}</p>

  @endforeach

  @include('labo.factures.facture_detail')

  @if ($elementDeFacture->facture->payee)

    <p>Facture réglée le {{ $elementDeFacture->facture->reglement->date_reglement }} par {{ $elementDeFacture->facture->reglement->modereglement->nom }}.</p>

  @else

    <p>Facture à régler avant le {{ Carbon\Carbon::parse($elementDeFacture->facture->faite_date)->addMonth()->isoFormat('LL') }} par chèque à l'ordre du Fibl France ou par virement.</p>

    <p>IBAN: </p>

  @endif

@endsection
