@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-xl-8">

        @titre(['titre' => "Création d'un nouvel utilisateur"])

      </div>

    </div>

    {!! Form::open(['route' => 'user.store', 'id' => 'userCreateForm']) !!}

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-xl-8">

        @include('admin.form.inputUsertype')

      </div>

    </div>

    <div class="row">

      <div class="m-auto col-md-10 col-xl-8 border">

        @include('admin.form.identite')

      </div>

    </div>

    <div class="row  my-3 justify-content-center">

      <div class=" m-auto col-md-10 col-xl-8">

        <input type="submit" class="btn btn-bleu" id="create_user" name="submit" value="Continuer">
        <a href="{{ route('laboratoire') }}">
          <button type="button" class="btn btn-secondary" name="reset">Annuler</button>
        </a>

      </div>

    </div>

  {!! Form::close() !!}

  </div>

@endsection
