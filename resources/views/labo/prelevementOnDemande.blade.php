{{-- issu de PrelevementController@createOnDemande --}}
{{-- VUE AFFICHANT LE FORMULAIRE DE SAISIE DES PRELEVEMENTS APRES LA PAGE DE SAISIE D UNE DEMANDE D ANALYSE --}}
@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-11 mx-auto">
        @flash(['couleur' => "alert-danger"]) {{-- Cas où aucune identification n'est faite --}}

        @titre(['titre' => __('titres.saisie_prelevements'), 'icone' => 'prelevement.svg'])

      </div>

    </div>

    <form id="prelevementCreate" action="{{ route('storeOnDemande') }}" method="post">

      @csrf

      <input type="hidden" name="demande_id" value="{{ $demande->id }}">
      <input type="hidden" name="analyse_id" value="{{ $analyse_id }}">
      <input type="hidden" name="nb_prelevement" value="{{ $demande->nb_prelevement }}">
      {{-- Si c'est un nouveau troupeau on fait un formulaire de création --}}
      @if ($demande->troupeau_id == null)

        <input type="hidden" name="nouveau_troupeau" value=1>

        <div class="row">

          <div class="col offset-md-1">

            <h5>@lang('demandes.infos_nouv_troup')</h5>

          </div>

        </div>

        @include('admin.troupeau.troupeauCreateDetail', [
          'espece_id_anterieure' => $demande->espece->id,
          'disabled' => true,
        ])
      {{-- sinon on affiche le troupeau correspondant --}}
      @else

        <input type="hidden" name="nouveau_troupeau" value=0>

        <div class="col-md-10 offset-md-1">

          <h5 id="troupeau" num="{{ $demande->troupeau->id }}">@lang('form.troupeau')&nbsp;: {{ $demande->troupeau->nom }} ({{ $demande->troupeau->typeprod->nom }})</h5>

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

@section('scripts')

  <script src="{{url('js/createPrelevement.js')}}"></script>

@endsection
