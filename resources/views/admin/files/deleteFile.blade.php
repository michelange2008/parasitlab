@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @include('fragments.flash')

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre([
            'icone' => 'files.svg',
            'titre' => ""
        ])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

        <div class="col-md-10">
  
  
        </div>
  
      </div>
  
  </div>

@endsection
