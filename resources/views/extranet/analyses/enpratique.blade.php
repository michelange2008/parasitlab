{{-- issu de CoproscopiesController@enpratique --}}
@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    @include('extranet.analyses.sousmenuAnalyses')

    <div class="row my-3 justify-content-end">

      <div class="col-md-10">

        @titre(['icone' => 'enpratique.svg', 'titre' => __('titres.enpratique.titre'), 'soustitre' => __('titres.enpratique.soustitre')])

      </div>

    </div>

    <div class="row my-3 justify-content-end">

      <div class="col-md-10">

        @include('extranet.analyses.enpratique.prelever')

      </div>

    </div>
    <div class="row justify-content-end">

      <div class="col-md-10">

        @include('extranet.analyses.enpratique.envoyer')

      </div>

    </div>

  </div>

@endsection
