@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form action="{{ route('observations.store') }}" method="post">

      @csrf

      <div class="row my-3 justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          @titre(['titre' => __('titres.algo_observation_add'), 'icone' => 'observation_add.svg'])

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          @foreach ($observation_items as $item)

            <div class="form-group">

              <label for="{{ $item->fornameid }}">@lang('form.'.$item->label)</label>

              <input class="form-control" type="text" name="{{ $item->fornameid }}" {{ $item->required ?? '' }}>

            </div>

          @endforeach

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-3 col-lg-3 col-xl-3">

          @include('admin.algorithme.inputCategorie')

        </div>

        <div class="col-md-4 col-lg-3 col-xl-3">

          @include('admin.algorithme.inputObservationCreateAssociations',
          [
            'groupe' => 'especes',
            'label' => 'observation_association_espece',
            'items' => $especes
          ])

        </div>

        <div class="col-md-4 col-lg-3 col-xl-3">

          @include('admin.algorithme.inputObservationCreateAssociations',
          [
            'groupe' => 'ages',
            'label' => 'observation_association_age',
            'items' => $ages])

        </div>

        <div class="col-md-11 col-lg-10 col-xl-9">

          @include('admin.algorithme.inputObservationCreateAssociationsAnaactes')

        </div>


      </div>

      <div class="row">

        <div class="mx-auto col-md-11 col-lg-10 col-xl-9">

          @enregistreAnnule(['route' => route('observations.index')])

        </div>

      </div>

    </form>

  </div>

@endsection
