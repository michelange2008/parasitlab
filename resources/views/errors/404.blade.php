@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code')

<div class="text-right">

  <p>Je suis désolé,</p>
  <p>Il y eu un petit problème.</p>
  <p>Mais pas d'inquiétude...</p>

</div>

@endsection

@section('message')

  <a class="btn btn-bleu" href="{{ route('accueil') }}">Retour à l'accueil</a>

@endsection
