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
        ],
        'nom' => $user->name,
       ])
      </div>

      <div class="col-md-4">

        {{-- INFORMATIONS SUR L'ELEVEUR --}}

        @include('admin.eleveurDetail')

      </div>

      <div class="col-md-8">

        @include('labo.demandesTableau')

      </div>

@endsection
