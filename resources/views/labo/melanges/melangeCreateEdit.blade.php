{{-- squelette commun pour les vues de création ou de modification d'un mélange  --}}
@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-10 mx-auto">

        @yield('titre')

      </div>

    </div>

    <div class="row">

      <div class="col-md-10 offset-md-1">

        <div class="media">
          <img class="mr-3" src="{{ url('storage/img/icones/'.$troupeau->espece->icone->nom) }}" alt="espece/species">
          <div class="media-body">
            <h5 class="mt-0">{{ $troupeau->user->name }}</h5>
            @lang('form.troupeau'): {{ $troupeau->nom }}
          </div>
        </div>

      </div>

    </div>

    @include('labo.melanges.melangeAddAnimal')

  @yield('animaux')

  @endsection
