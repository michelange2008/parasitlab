@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')
  <div class="container-fluid">
    <div class="row my-3">
      <div class="col">
        <div class="alert bg-success">
          <h1>Création d'un nouvel utilisateur</h1>
        </div>
      </div>
    </div>
    {!! Form::open(['route' => 'user.store']) !!}
    <div class="form-group row my-3">
      <div class="col">
        <input type="text" class="form-control" name="name" value="" required placeholder="Nom de l'utilisateur">
      </div>

      <div class="col">
        <input type="email" class="form-control "name="email" value="" required placeholder="Email">
      </div>
    </div>
    <fieldset class="form-group">
      <div class="row">
          @foreach ($usertypes as $usertype)
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="usertype" id="usertype_{{ $usertype->id }}" value="{{ $usertype->route }}"
                @php
                  if($usertype->nom === 'éleveur') echo 'checked';
                @endphp
                >
                <label class="form-check-label" for="usertype">{{ $usertype->nom }}</label>
              </div>
            </div>
          @endforeach
      </div>
    </fieldset>

    <input type="submit" class="btn btn-success" name="submit" value="Enregistrer">
    <a href="{{ route('laboratoire') }}">
      <button type="button" class="btn btn-secondary" name="reset">Annuler</button>
    </a>
  {!! Form::close() !!}

    </div>

  </div>

@endsection
