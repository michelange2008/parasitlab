@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre(['titre' => "Eleveurs, éleveuses ... reprenez la maîtrise de votre parasitisme&nbsp;!", 'icone' => 'eleveur.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10">

        <img src="{{ url('storage/img/cv_pature.jpg') }}" alt="chevaux pature">

      </div>

    </div>

  </div>

@endsection
