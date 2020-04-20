@extends('layouts.app')

@section('content')

  <div class="jumbotron jumbotron-fluid">

    <div class="container">

      <h1 class="display-4">{{ ucfirst(__('commun.merci')) }}&nbsp;!</h1>
      <p class="lead">@lang('commun.envoipackok_1')</p>
      <hr class="my-4">
      <p>@lang('commun.envoipackok_2')</p>
      <a class="btn btn-bleu" href="{{ route('accueil') }}">@lang('boutons.retour_accueil')</a>

    </div>

  </div>

@endsection
