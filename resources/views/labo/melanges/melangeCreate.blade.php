@extends('labo.melanges.melangeCreateEdit')

@section('titre')

  @titre(['titre' => __('titres.melange_create_suite'), 'icone' => 'mela_add.svg'])

@endsection

{{-- Attention entre les section titre et animaux, il y a la partie originale
dans melangeCreateEdit avec la présentation de l'éleveur et le formulaire Pour
ajouter un nouvel animal --}}

@section('animaux')

  @include('labo.melanges.melangeCreateListeAnimaux')

@endsection
