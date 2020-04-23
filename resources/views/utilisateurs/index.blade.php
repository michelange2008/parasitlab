@extends('layouts.app')

@section('menu')

  @include("extranet.menuExtranet")

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-end">

      <div class="col-md-3">

        @include('utilisateurs.pagePerso')

        @include('utilisateurs.vetos.boutonModifInfos')

      </div>

      <div class="col-md-9">

        @include('admin.index.index')

      </div>

    </div>

  </div>

@endsection
