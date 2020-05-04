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
          'titre' => $elementDeFacture->facture->user->name ,
          'soustitre' => "- ".__('factures.num_date', [
            'num' => $elementDeFacture->facture->num,
            'date' => \Carbon\Carbon::parse($elementDeFacture->facture->faite_date)->isoFormat('LL'),
          ]),
          'icone' => 'factures.svg'
        ])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10">

        @include('labo.factures.facture_entete')

      </div>

    </div>


  <div class="row justify-content-center">

    <div class="col-md-10">

      @include('labo.factures.facture_detail')

    </div>

  </div>

  <div class="row justify-content-center">

    <div class="col-md-10">

      @boutonUser([
        'route' => 'facture.pdf', 'id' => $elementDeFacture->facture->id,
        'intitule' => 'show_pdf',
        'couleur' => 'btn-rouge',
        'fa' => 'fas fa-file-pdf',
        'target' => "_blank",
      ])
      @boutonUser([
        'route' => 'mail.envoyerFacture', 'id' => $elementDeFacture->facture->id,
        'intitule' => 'send',
        'couleur' => 'btn-bleu',
        'fa' => 'fas fa-paper-plane',
      ])
      <hr class="divider-court">
    </div>

  </div>

  <div class="row justify-content-center my-3">

    <div class="col-md-10 p-3 border">

      @if ($elementDeFacture->facture->payee)

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
