@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-4 justify-content-center">

      <div class="col-md-3">

        <img class="img-100 img-change" src="{!! asset('storage/img/ostertagia_2.jpg') !!}" alt="coproscopie">

      </div>

      <div class="col-md-5 lead align-middle">

          <p>{{ __('accueil.veterinaires_1') }}</p>
          <p>{{ __('accueil.veterinaires_2') }}</p>

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-8 lead">

        <p>
          <img class="img-40" src="{!! asset('storage/logo.svg') !!}" alt="Parasit'Lab">
          {{ __('accueil.pl_propose') }}: {{ __('accueil.copro_f') }}, {{ __('accueil.baermann') }}, ...
        </p>

        <p>{{ ucfirst(__('accueil.innov')) }} <span class="font-weight-bolder">{{ __('accueil.compte_haem') }}</span>.</p>

        <p>{{ __('accueil.analyse_series') }}: {{ __('accueil.suivi') }} {{ __('commun.et') }} {{ __('accueil.resist') }}.</p>

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-8 d-flex justify-content-around">

        @foreach ($anapacks as $anapack)

          <img class="btn pulsate-fwd" src="{!! asset('storage/img/icones').'/'.$anapack->icone->nom !!}" alt="coproscopie" title="{{ $anapack->nom }}">

        @endforeach

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-4 lead">

        <p>{{ __('accueil.kit_envoi') }}.</p>

      </div>

      <div class="col-md-4 lead">

        <p>{{ __('accueil.repondre_questions') }}.</p>

      </div>

    </div>

  </div>

@endsection
