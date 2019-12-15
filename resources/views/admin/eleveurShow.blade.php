@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-12">

        @include('fragments.breadcrumb', [
          "liste" => [
            "Accueil" => "laboratoire",
            "Eleveurs" => "eleveurAdmin.index"
          ]
        ])
      </div>

    </div>

    <div class="row my-3 justify-content-center flex-xl-nowrap">


      <div class="col-md-4 col-lg-3 bd-sidebar">

        {{-- INFORMATIONS SUR L'ELEVEUR --}}


          @include('admin.eleveurDetail', ['personne' => $user->eleveur])


      </div>

      <div class="col-md-8 col-lg-9 bd-content">

        @include('admin.index.index')

      </div>

@endsection
