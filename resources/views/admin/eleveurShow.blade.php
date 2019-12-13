@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-12">

        @include('fragments.breadcrumb', [
          "liste" => [
          "Accueil" => "laboratoire",
          "Eleveurs" => "eleveurAdmin.index"
         ]
       ])
      </div>

      <div class="col-md-4 col-lg-3">

        {{-- INFORMATIONS SUR L'ELEVEUR --}}


          @include('admin.eleveurDetail')


      </div>

      <div class="col-md-8 col-lg-9">

        @include('admin.index')

      </div>

@endsection
