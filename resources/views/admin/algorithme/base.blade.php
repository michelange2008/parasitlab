@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  @include('admin.algorithme.modalEspecesAges')
  @include('admin.algorithme.modalAgesAnaactes')
  @include('admin.algorithme.modalEspecesObservations')
  @include('admin.algorithme.modalAgesObservations')
  @include('admin.algorithme.modalAnaactesObservations')
  @include('admin.algorithme.modalObservationsOptions')
  @include('admin.algorithme.modalEspecesAnaactes')
  @include('admin.algorithme.modalAnaactesOptions')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @titre(['titre' => 'Algorithme de choix des analyses', 'icone' => 'labo.svg'])

      </div>
    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @include('admin.algorithme.schema')

      </div>

    </div>

  </div>

@endsection

@section('scripts')

  <script src="{{url('js/algorithme.js')}}"></script>

@endsection
