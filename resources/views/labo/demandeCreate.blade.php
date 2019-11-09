@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

<div class="container-fluid">

{!! Form::open(['route' => 'demandes.store']) !!}
  <div class="form-group">
    <label for="userSelect">Demandeur</label>
    <select multiple class="form-control" id="userSelect">
      @foreach ($listeEleveurs as $eleveur)
        <option>{{$eleveur->user->name}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="especeSelect">Espèce</label>
    <select multiple class="form-control" id="especeSelect">
      @foreach ($listeEspeces as $espece)
        <option>{{ucfirst($espece->nom)}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="anapackSelect">Pack d'analyses</label>
    <select multiple class="form-control" id="anapackSelect">
      @foreach ($listeAnapacks as $anapack)
        <option>{{$anapack->nom}}</option>
      @endforeach
    </select>
  </div>

  <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="toVeto">
    <label class="custom-control-label" for="toVeto">Envoi des résultats au vétérinaire</label>
  </div>

  <div class="form-group">
    <label for="vetoSelect">Vétérinaire</label>
    <select multiple class="form-control" id="vetoSelect">
      @foreach ($listeVetos as $veto)
        <option>{{$veto->user->name}}</option>
      @endforeach
    </select>
  </div>

{!! Form::close() !!}

</div>

@endsection
