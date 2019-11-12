@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

<div class="container-fluid">

{!! Form::open(['route' => 'demandes.store']) !!}

<!-- CHOIX DE L'UTILISATEUR -->

  <div class="form-group">
    <label for="userSelect">Demandeur</label>
    <select multiple class="form-control" id="userSelect" name="user" required>
      @foreach ($eleveurs as $eleveur)
        <option>{{$eleveur->user->name}}</option>
      @endforeach
    </select>
  </div>

<!-- CHOIX DE L'ESPECE -->

  <div class="form-group">
    <label for="especeSelect">Espèce</label>
    <select multiple class="form-control" id="especeSelect" name="espece" required>
      @foreach ($especes as $espece)
        <option>{{(mb_convert_case($espece->nom, MB_CASE_TITLE))}}</option>
      @endforeach
    </select>
  </div>

<!-- CHOIX DE L'ANALYSE -->

  <div class="form-group">
    <label for="anapackSelect">Pack d'analyses</label>
    <select multiple class="form-control" id="anapackSelect" name="anapack" required>
      @foreach ($anapacks as $anapack)
        <option>{{mb_convert_case($anapack->nom, MB_CASE_TITLE)}}</option>
      @endforeach
    </select>
  </div>

<!-- DOIT ON ENVOYER LES RESULTATS AU VETO -->

  <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="toVeto" name="toveto">
    <label class="custom-control-label" for="toVeto">Envoi des résultats au vétérinaire</label>
  </div>

  <!-- CHOIX DU VETO -->

  <div class="form-group">
    <label for="vetoSelect">Vétérinaire</label>
    <select multiple class="form-control" id="vetoSelect" name="veto">
      @foreach ($vetos as $veto)
        <option>{{mb_convert_case($veto->user->name, MB_CASE_TITLE)}}</option>
      @endforeach
    </select>
  </div>

  <!-- CHOIX DU DESTINATAIRE DE LA FACTURE -->

  <div class="form-group">
    <p for="">Destinataire de la facture</p>
    @foreach ($usertypes as $type)
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="{{ $type->route }}" name="facture" value="{{ $type->route }}" class="custom-control-input"
        @php
          if($type->route === 'eleveur') echo 'checked';
        @endphp
        >
        <label class="custom-control-label" for="{{ $type->route}}">{{ mb_convert_case($type->nom, MB_CASE_TITLE)}}</label>
      </div>

    @endforeach
  </div>

  <!-- SAISIE DES DATES DE PRELEVEMENT (NON REQUIS) OU DE RECEPTION (REQUIS) -->

  <div class="form-group">
    <label for="date_prelevement">Date du prélèvement</label>
    <input type="date" name="prelevement" value="">
  </div>

  <div class="form-group">
    <label for="date_reception">Date de réception</label>
    <input id="reception" type="date" name="reception" value="" required>
  </div>

  <input type="submit" class="btn btn-success" name="" value="Ok">
{!! Form::close() !!}

</div>

@endsection
