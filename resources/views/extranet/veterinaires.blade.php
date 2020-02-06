@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-2">

        <img class="img-100" src="{!! asset('storage/img/ostertagia.jpg') !!}" alt="coproscopie">

      </div>

      <div class="col-md-6 lead align-middle">

          <p>{{ __('accueil.veterinaires_1') }}</p>
          <p>{{ __('accueil.veterinaires_2') }}</p>

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-8 lead">

        <p>
          <img class="img-40" src="{!! asset('storage/logo.svg') !!}" alt="Parasit'Lab">
          {{ __('accueil.pl_propose') }}: {{ __('accueil.copro_f') }}, {{ __('accueil.baermann') }}
        </p>

      </div>

      <div class="col-md-4">

        <div class="card-deck">

          <div class="card">

            <img src="{!! asset('storage/img/icones/copr.svg') !!}" alt="coproscopie">

            <div class="">

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

@endsection
