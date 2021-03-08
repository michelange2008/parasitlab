@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="col-md-3 bd-sidebar my-3 d-none d-md-block">

      {{-- INFORMATIONS SUR Le vétérinaire --}}

      @include('admin.vetoDetail', ['personne' => $user->veto])


    </div>

    <div class="row my-3 justify-content-end">

      <div class="col-md-8 col-lg-9">

        @include('fragments.breadcrumb', [
          'liste' => [
            "Accueil" => 'laboratoire',
            "Vétérinaires" => 'vetoAdmin.index'
          ],
          'nom' => $user->name
        ])
      </div>

    </div>

    <div class="row my-3 justify-content-end flex-xl-nowrap">


      <div class="col-md-8 col-lg-9 bd-content">

        @include('admin.index.index')

      </div>

@endsection
