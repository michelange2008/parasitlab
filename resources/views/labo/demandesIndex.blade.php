{{-- ISSU DE DemandeController@index --}}
@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">
    <div class="row">
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
    </div>
    <div class="row mt-3">
      <div class="alert alert-bleu col d-inline-flex">
        <img class="img-40" src="{{ asset('storage/img/icones/microscope.svg')}}" alt="microscope">
        <h3 class="mx-3">Liste des analyses</h3>
      </div>
    </div>
    <div class="row">
        <div class="col">
          @include('labo.demandesTableau')
        </div>
    </div>

  </div>



@endsection
