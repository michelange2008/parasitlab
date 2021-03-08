@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="col-md-3 bd-sidebar my-3 d-none d-md-block">

      {{-- INFORMATIONS SUR L'ELEVEUR --}}

      @eleveurDetail(['personne' => $user->eleveur])

    </div>

    <div class="row my-3 justify-content-end">

      <div class="col-md-8 col-lg-9">

        @include('fragments.breadcrumb', [
          "liste" => [
            "Tous les utilisateurs" => "user.index",
            "Eleveurs" => "eleveurAdmin.index",
          ],
          "nom" => $user->name,
        ])
      </div>

    </div>

    <div class="row my-3 justify-content-end flex-xl-nowrap">


      <div class="col-md-8 col-lg-9 bd-content">

        @include('admin.index.index')

      </div>

@endsection
