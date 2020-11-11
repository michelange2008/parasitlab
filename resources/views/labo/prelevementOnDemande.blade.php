@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-11 mx-auto">

        @titre(['titre' => __('titres.saisie_prelevements'), 'icone' => 'prelevement.svg'])

      </div>

    </div>


    <form id="prelevementCreate" action="{{ route('storeOnDemande') }}" method="post">

      @csrf
      {{-- Si c'est un nouveau troupeau on fait un formulaire de création --}}
      @if ($demande->troupeau_id == null)

        <div class="row">

          <div class="col offset-md-1">

            <h5>@lang('demandes.infos_nouv_troup')</h5>

          </div>

        </div>

        @include('admin.troupeau.troupeauCreateDetail')
      {{-- sinon on affiche le troupeau correspondant --}}
      @else

        <div class="col-md-10 offset-md-1">

          <h5>@lang('form.troupeau')&nbsp;: {{ $demande->troupeau->nom }} ({{ $demande->troupeau->typeprod->nom }})</h5>

        </div>

      @endif

      <div class="row">

        <div class="col-md-10 offset-md-1">

          <hr class="divider">

        </div>

      </div>

      <div class="row">
        {{-- On affiche autant de formulaire de prélèvement qu'il y a de prélèvements  --}}
        @for ($i=1; $i < $demande->nb_prelevement +1 ; $i++)

          @include('labo.demandeForm.demandeLignePrelevement')

        @endfor

      </div>

      <div class="row">

        <div class="col-md-11 offset-md-1">

          @enregistreAnnule()

        </div>

      </div>

    </form>

  </div>

@endsection
