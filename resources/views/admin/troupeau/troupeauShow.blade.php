@extends('layouts.app')


@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row justify-content-center my-3">

      <div class="col-md-8 col-lg-9">

        @titre(['titre' => $troupeau->nom, 'icone' => $troupeau->typeprod->espece->icone->nom, 'soustitre' => "(".$troupeau->user->name.")"])

      </div>

    </div>

  </div>


@endsection
