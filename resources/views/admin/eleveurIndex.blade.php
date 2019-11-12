@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">
    <div class="row my-3">
      <div class="col-md-10 alert alert-bleu d-inline-flex">
        <img src="{{ asset('storage/img/icones/eleveur.svg') }}" alt="Eleveur">
        <h3>Liste de éleveurs</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10">
        <div class="table table-striped table-bordered table-hover">

        </div>
      </div>

    </div>
  </div>

@endsection
