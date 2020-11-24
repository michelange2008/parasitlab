@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-10 offset-md-1">

        @titre(['titre' => 'Exportation de résultats', 'icone' => 'export.svg'])

      </div>

    </div>

  </div>

@endsection
