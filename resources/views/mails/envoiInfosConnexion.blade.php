{{-- template qui construit le mail d'envoi des infos de connexion.
Est appelé par app\Mail\EnvoiInfosConnexion.php --}}
@extends('layouts.mail')

@section('content')

  <h4>{{ __('Hello!') }}</h4>

  <p>@lang('mails.envoiInfosConnexion.intro')</p>

  <div class="">

    <a href="{!! url('login') !!}">Parasit'Lab

      {{-- <img class="img-90" src="{{ $message->embed(url('storage/logo.svg')) }}" alt="Parasit'Lab"> --}}

    </a>

  </div>

  @if ($estVeto)

    <p>@lang('mails.envoiInfosConnexion.info_veto')</p>

  @elseif ($estEleveur)

    <p>@lang('mails.envoiInfosConnexion.info_eleveur')</p>

  @endif

  <p>@lang('mails.envoiInfosConnexion.si_erreur')</p>

  <hr class="divider">

  <h3>@lang('mails.envoiInfosConnexion.login_mdp')</h3>

  <ul>

    <li>Login&nbsp;:&nbsp;{{ $user->email }}</li>

    <li>{{ __('Password') }}&nbsp;:&nbsp;{{ $user->password }}</li>

  </ul>

  <hr class="divider">

  <p>@lang('mails.envoiInfosConnexion.warning_mdp')</p>

  <p>
    @lang('mails.envoiInfosConnexion.how_reset_mdp')&nbsp;

    <a class="btn btn-red" href="{{ url('password/reset') }}">{{ __('Reset Password') }}</a>

  </p>

  <hr class="diviser">

    @include('mails.rgpd_eleveur')

  <hr class="diviser">

  <p>@lang('commun.contact_us'){{ config('laboInfos.email_contact')   }}</p>
  <br>
  <p>@lang('commun.cordialement'),</p>
  <br>
  <p class="font-weight-bold">@lang('commun.fibl_team')</p>

@endsection
