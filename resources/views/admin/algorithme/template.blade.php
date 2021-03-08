@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-ld-11 col-lg-1à col-xl-9">

        @titre(['titre' => __('titres.algo_age_espece'), 'icone' => 'espece.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">


      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @retour(['route' => route('algorithme.index')])

      </div>

    </div>

  </div>

@endsection
