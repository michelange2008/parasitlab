@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-xl-8">

        @titre(['titre' => "Création d'un nouvel utilisateur"])

      </div>

    </div>

    {!! Form::open(['route' => 'user.store']) !!}

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-xl-8">

        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          @foreach ($usertypes as $usertype)
            <label class="btn btn-rouge active mx-3">
              <input type="radio" name="{{ $usertype->id }}" id="{{ $usertype->id }}">{{$usertype->nom}}
            </label>
          @endforeach
        </div>

      </div>

  </div>

    <div class="row">

      <div class="m-auto col-md-10 col-xl-8 border">

        @include('admin.form.identite')

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
