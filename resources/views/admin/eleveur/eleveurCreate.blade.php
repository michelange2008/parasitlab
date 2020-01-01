@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row  my-3 justify-content-center">

      <div class="col-md-10 col-xl-8">

        @titreCreationUser()

      </div>

    </div>

    <div class="row justify-content-center">

      @include('admin.eleveur.eleveurCreateForm')

    </div>

  </div>

@endsection
