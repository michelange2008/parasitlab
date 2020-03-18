@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

<div class="col-md-4 bd-sidebar my-3 d-none d-md-block" style="left:0px">

      {{-- INFORMATIONS SUR L'ELEVEUR --}}

      @include('admin.eleveurDetail')

    </div>

    <div class="row my-3 justify-content-end">

      <div class="col-md-12">

        @include('fragments.breadcrumb', [
          'liste' => [
            "Accueil" => 'laboratoire',
            "Eleveurs" => 'eleveurAdmin.index'
          ],
          'nom' => $user->name
       ])
      </div>

    </div>

    <div class="row justify-content-end">


      <div class="col-md-8">

        @include('labo.demandesTableau')

      </div>

@endsection
