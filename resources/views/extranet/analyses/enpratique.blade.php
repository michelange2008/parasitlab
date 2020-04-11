{{-- issu de AnalysesController@enpratique --}}
@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @include('fragments.progression')

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre(['icone' => 'enpratique.svg', 'titre' => __('titres.enpratique')])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10">

        @include('extranet.analyses.enpratique.prelever')

      </div>

    </div>
    <div class="row justify-content-center">

      <div class="col-md-10">

        @include('extranet.analyses.enpratique.envoyer')

      </div>

    </div>

  </div>

@endsection
