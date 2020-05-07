@extends('layouts.facturesPDF')

@section('content')

  <div style="margin-left:280px; border: 1px solid black; padding-left:20px">

    <p class="adresse font-weight-bold mt-1">{{ $elementDeFacture->facture->user->name }}</p>
    <p class="adresse">{{ $elementDeFacture->facture->user->eleveur->address_1 }} - {{ $elementDeFacture->facture->user->eleveur->address_2 }}</p>
    <p class="adresse mb-1">{{ $elementDeFacture->facture->user->eleveur->cp }} {{ $elementDeFacture->facture->user->eleveur->commune }}</p>

  </div>

  <p class="font-weight-bold lead">@lang('factures.facture')&nbsp;n°{{ $elementDeFacture->facture->num }} @lang('commun.du')&nbsp;{{ Carbon\Carbon::parse($elementDeFacture->facture->faite_date)->isoFormat('LL') }}</p>

  @foreach ($elementDeFacture->demandes as $demande)

    <p class="pl-3 color-bleu font-weight-bold">{{ ucfirst(__($demande->anaacte->anatype->nom)) }} @lang('commun.du')&nbsp;{{ Carbon\Carbon::parse($demande->date_reception)->isoFormat('LL') }}</p>

  @endforeach

  @include('labo.factures.facture_detail')

  @if ($elementDeFacture->facture->payee)

    <p>@lang('factures.facture_payee_le') {{ \Carbon\Carbon::parse($elementDeFacture->facture->reglement->date_reglement)->isoFormat('LL') }} @lang('commun.par') {{ $elementDeFacture->facture->reglement->modereglement->nom }}.</p>

  @else

    <p>@lang('factures.facture_a_regler') {{ Carbon\Carbon::parse($elementDeFacture->facture->faite_date)->addMonth()->isoFormat('LL') }} @lang('factures.pay_to_fibl')</p>

    <p>@lang('factures.iban'):&nbsp;{{ config('laboInfos.iban') }}</p>
    <p>@lang('factures.bic'):&nbsp;{{ config('laboInfos.bic') }}</p>

  @endif

@endsection
