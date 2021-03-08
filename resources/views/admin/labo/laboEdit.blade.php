@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="m-auto col-md-11 col-lg-10 col-xl-9">

        @titre(['titre' => $user->name, 'soustitre' => " : modification des informations"])

      </div>

    </div>

    <div class="row">

      <div class="mx-auto col-md-11 col-lg-10 col-xl-9">

        {!! Form::open(['route' => ['user.update', $user->id], 'enctype' => 'multipart/form-data'], $user->id) !!}

        @METHOD('PUT')

          <input type="hidden" name="usertype_id" value="{{ $user->usertype->id }}">

          @include('admin.form.identite')

          @include('admin.form.images')

          @include('admin.form.inputFonction')

          <div class="m-3">

            @enregistreAnnule(['route' => route('laboAdmin.index')])

          </div>

        {!! Form::close() !!}

      </div>

    </div>

  </div>

@endsection
