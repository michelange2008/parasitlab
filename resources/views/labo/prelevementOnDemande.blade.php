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


    <form id="prelevementCreate" action="prelevement.storeOnDemande" method="post">

      @csrf

      @if ($demande->troupeau_id == null)

        <div class="row">

          <div class="col offset-md-1">

            <h5>Comme il s'agit d'un nouveau troupeau, il font en saisir les informations.</h5>

          </div>

        </div>

        @include('admin.troupeau.troupeauCreateDetail')

      @else

        <h5>{{ $demande->troupeau->nom }}</h5>

      @endif

      <div class="row">

        <div class="col-md-10 offset-md-1">

          <hr class="divider">

        </div>

      </div>

      <div class="row">

        @for ($i=1; $i < $demande->nb_prelevement +1 ; $i++)

          @include('labo.demandeForm.demandeLignePrelevement')

        @endfor

      </div>

    </form>

  </div>

@endsection
