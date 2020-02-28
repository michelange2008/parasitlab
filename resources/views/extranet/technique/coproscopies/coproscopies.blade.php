@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-10 col-lg-8 mx-auto">

        @titre(['icone' => 'analyse.svg', 'titre' => "Les examens coproscopiques"])

      </div>

      <div class="col-md-10 col-lg-8 d-flex flex-row mx-auto">

        <div class="media">

          <img class="mr-3" src="{!! asset('storage/img/image_test.jpg') !!}" alt="image">

          <div class="media-body">

          <h3 class="text-secondary">Qu'est-ce qu'une coproscopie ?</h3>

          <p class="lead">C'est un examen de laboratoire qui vise à compter les oeufs ou les larves de parasite présents dans les fécès.</p>

          <p class="lead"></p>
        </div>

      </div>

    </div>

  </div>
@endsection
