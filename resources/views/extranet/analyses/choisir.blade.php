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



    <div class="row justify-content-end">

      <div class="col-md-4">

        @include('extranet.analyses.choisir.methodeChoixAnalyse')

      </div>

      <div class="col-md-6">

        {{-- @include('extranet.analyses.choisir.listeAnalysesProposees') --}}
        @include('extranet.analyses.choisir.options')
      </div>

    </div>

</div>

@endsection
