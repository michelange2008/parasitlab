@extends('layouts.mail')

@section('content')

  <h4>{{ __('Hello!') }}</h4>

  <p>@lang('mails.envoiInfosConnexion.intro')</p>

  <div class="">

    <a href="{{ url('login') }}">

      <img class="img-90" src="{{ url('storage/logo.svg') }}" alt="Parasit'Lab">

    </a>

  </div>
  <hr class="divider">
  <h3>@lang('mails.envoiInfosConnexion.login_mdp')</h3>
  <ul>

    <li>Login&nbsp;:&nbsp;{{ $user->email }}</li>
    <li>{{ __('Password') }}&nbsp;:&nbsp;{{ $user->password }}</li>
  </ul>
  <hr class="divider">
  <p>@lang('mails.envoiInfosConnexion.warning_mdp')</p>

  <p>
    @lang('mails.envoiInfosConnexion.how_reset_mdp')

    <a class="btn" href="{{ url('password/reset') }}">{{ __('Reset Password') }}</a>

  </p>

  <p>@lang('commun.contact_us'){{ config('laboInfos.email_contact') }}</p>
  <br>
  <p>@lang('commun.cordialement'),</p>
  <br>
  <p class="font-weight-bold">@lang('commun.fibl_team')</p>

@endsection
