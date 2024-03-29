@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row justify-content-center">

      <div class="p-2 col text-center bg-light">

        <h1 class="h2">~ Tableau de bord ~</h1>
      </div>

    </div>

    <div class="row">

        <div class="d-none d-md-block col-md-2 bg-light">

            @include('admin.dashboard.dashmenu')

        </div>

        <div class="col-lg-8 col-md-10 border-left border-right border-top">

            @include('admin.dashboard.dashmain')

        </div>

        <div class="d-none d-lg-block col-lg-2 bg-light">

            @include('admin.dashboard.dashstats')

        </div>

    </div>

  </div>

@endsection
