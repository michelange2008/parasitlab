@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-10 m-auto">

        @titre(['titre' => __('accueil.choisir_analyse'), 'icone' => 'question.svg'])

      </div>

      <div class="col-md-10 mx-auto my-3">

        @include('extranet.analyses.choisir.titre', ['titre' =>  __('accueil.queltype'), 'soustitre' => __('accueil.cliquerespece')])

      </div>

      <div class="col-md-10 mx-auto my-3 d-flex justify-content-around">

        @include('extranet.analyses.choisir.listeEspeces')

      </div>

    </div>

    <div id='liste_anapacks' class="row my-3" style="display:none">

      <div class="col-md-10 m-auto">

        @include('extranet.analyses.choisir.titre', ['titre' => __('analyseproposees '), 'id' => 'titre'])

      </div>

    </div>


      <div class="row my-3">

        @foreach ($liste as $espece_id => $anapacks)

        <div class="col-md-10 mx-auto">

          <div class="card-deck d-flex justify-content-center">


              @foreach ($anapacks as $anapack)

                @include('extranet.analyses.choisir.listeAnalysesProposees')

              @endforeach

            </div>

          </div>

        @endforeach

      </div>


  </div>

@endsection
