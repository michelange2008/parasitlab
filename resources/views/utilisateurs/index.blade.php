@extends('layouts.app')

@section('menu')

  @include("extranet.menuExtranet")

@endsection

@section('content')

  <div class="container-fluid">

    <div class="col-lg-3 bd-sidebar">

      @include('utilisateurs.pagePerso')

    </div>

    <div class="row my-3 justify-content-end">


      <div class="col-lg-9">

        @include('admin.index.index')

      </div>

    </div>

  </div>

@endsection
