@extends('layouts.app')

@section('content')

  <div class="row justify-content-center entravaux">


      <div class="text-center entravaux-text">

        <p class="lead">Désolé, cette page n'est pas finie!</p>

        <img src="{{ url('storage/img/icones/entravaux.svg') }}" alt="En travaux">

        <p>

          <a class="btn btn-bleu btn-lg" href="{{ URL::previous()}}">retour</a>

        </p>

      </div>


  </div>

@endsection
