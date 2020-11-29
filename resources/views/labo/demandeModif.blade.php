@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-11">

        @include('fragments.flash')

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-11 offset-md-1">

        @titre(['titre' => __('titres.demande_modif'), 'icone' => 'formulaire_vierge.svg'])

      </div>

    </div>

    <form id="demandeModif" class="" action="{{ route('demandes.update', $demande->id) }}" method="post">

      @csrf

      @method('put')

      <div class="row my-3">

        <div class="col-md-11 offset-md-1">

          <h4>{{ $demande->user->name }} - {{ $demande->troupeau->nom }} ({{ mb_strtolower($demande->espece->nom) }}) - {{ $demande->anaacte->nom }}</h4>

        </div>

      </div>

      <div class="row my-3">

        <div class="col-md-4 offset-md-1">

          <div class="row">

            <div class="col-md-12">

              <p class="lead pl-3 bg-bleu-tres-fonce text-white">@lang('form.dates')</p>

              @include('labo.demandeForm.inputDates')

            </div>

            <div class="col-md-12">

              <p class="lead pl-3 bg-bleu-tres-fonce text-white">@lang('form.nb_prelevement')</p>

              <input id="n_bPrelevement" class="form-control" type="number" name="nb_prelevement" value="{{ $demande->nb_prelevement }}" min="{{ $demande->nb_prelevement}}">


            </div>


          </div>

        </div>


        <div class="col-md-5 offset-md-1">

          <p class="lead pl-3 bg-bleu-tres-fonce text-white">@lang('form.resultats_factures')</p>

          @include('labo.demandeForm.inputChoixVeto')

          @include('labo.demandeForm.inputEnvoiFacture')

        </div>

      </div>

      @include('labo.demandeForm.demandeInformations')

      <div class="row">

        <div class="col-md-11 offset-md-1">

          @enregistreAnnule()

        </div>

      </div>

    </form>

  </div>

@endsection

@section('scripts')

  <script src="{{url('js/demandeModif.js')}}"></script>

@endsection
