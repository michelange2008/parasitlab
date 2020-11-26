{{-- VUE AFFICHANT LE FORMULAIRE DE SAISIE D'UN SEUL PRELEVEMENTS QUAND IL Y A DES PRELEVEMENTS NON RENSEIGNES --}}
@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-11 mx-auto">

        @titre(['titre' => __('titres.saisie_un_prelevement'), 'icone' => 'prelevement.svg'])

      </div>

    </div>

    <form id="prelevementCreate" action="{{ route('storeOne') }}" method="post">

      @csrf

      <input type="hidden" name="demande_id" value="{{ $demande->id }}">
      <input type="hidden" name="analyse_id" value="{{ $analyse_id }}">

      <input type="hidden" name="rang" value={{ $rang }}>

      <div class="col-md-10 offset-md-1">

        <h5 id="troupeau" num="{{ $demande->troupeau->id }}">@lang('form.troupeau')&nbsp;: {{ $demande->troupeau->nom }} ({{ $demande->troupeau->typeprod->nom }})</h5>

      </div>

      <div class="row">

        <div class="col-md-10 offset-md-1">

          <hr class="divider">

        </div>

      </div>

      <div class="row">

        @include('labo.demandeForm.demandeLignePrelevement', ['i' => $rang])

      </div>

      <div class="row">

        <div class="col-md-11 offset-md-1">

          @enregistreAnnule()

        </div>

      </div>

    </form>

  </div>

@endsection

@section('scripts')

  <script src="{{url('js/createPrelevement.js')}}"></script>

@endsection
