@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    @include('extranet.analyses.sousmenuAnalyses')

    <div class="row my-3 justify-content-end">

      <div class="col-md-10">

        @titre(['titre' => __('titres.choisir_analyse'), 'icone' => 'choisir.svg'])

      </div>

      <div class="col-md-10 my-3">

        @include('extranet.analyses.choisir.titre', ['titre' =>  __('choisir.queltype'), 'soustitre' => __('choisir.cliquerespece')])

      </div>

      <div class="col-md-10 my-3 d-md-flex justify-content-around">

        @include('extranet.analyses.choisir.listeEspeces')

      </div>

    </div>

    <div id='liste_anatypes' class="row my-3 justify-content-end" style="display:none">

      <div class="col-md-10">

        @include('extranet.analyses.choisir.titre', ['titre' => __('analyseproposees '), 'id' => 'titre'])

      </div>

    </div>

    <div class="row my-3 justify-content-end">

      <div class="col-md-10">

        <div class="card-deck d-md-flex justify-content-center">

          @foreach ($especes as $espece)

            @foreach ($espece->anatypes as $anatype)

              @include('extranet.analyses.choisir.listeAnalysesProposees')

            @endforeach

          @endforeach

        </div>

      </div>

    </div>

  </div>

@endsection
