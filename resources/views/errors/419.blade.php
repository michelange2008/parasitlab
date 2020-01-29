@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))
@section('bouton')
  <a href="{{ route('home') }}" class="btn btn-bleu">Retour à l'accueil</a>
@endsection
