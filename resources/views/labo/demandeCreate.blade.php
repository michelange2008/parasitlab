@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

<div class="container-fluid">

  <div class="row">

    <div class="col-md-10 mx-auto">

      @include('admin.titreCreationDemande')

    </div>

  </div>

  {!! Form::open(['route' => 'demandes.store']) !!}

  @include('labo.demandeForm.demandePrincipal')

  @include('labo.demandeForm.demandeInformations')

  @include('labo.demandeForm.demandePrelevement')

  @include('labo.demandeForm.demandeEnvois')

  <div class="row my-3 justify-content-center">

    <div class="col-md-10">

      @enregistreAnnule()

    </div>

  </div>

  {!! Form::close() !!}

</div>

@endsection
