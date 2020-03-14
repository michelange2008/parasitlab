@extends('layouts.app')

@extends('extranet.menuExtranet')


@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre(['titre' => 'La résistance aux anthelmintiques&nbsp;:', 'soustitre' => "un sujet d'avenir", 'icone' => 'test_resistance.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-8">

        <div class="embed-responsive embed-responsive-16by9">

          <iframe class="embed-responsive-item" src="{{ url('storage/img/resist/resistancesHD.mp4') }}" allowfullscreen></iframe>

        </div>

      </div>

    </div>

  </div>

@endsection
