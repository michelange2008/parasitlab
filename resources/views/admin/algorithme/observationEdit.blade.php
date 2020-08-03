@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form action="{{ route('observations.update', $observation->id) }}" method="post">

      @csrf
      @method('put')
      {{-- Champs caché qui permet de savoir quel type de modification on apporte à l'observation --}}
      <input type="hidden" name="type" value="observation">



    <div class="row my-3 justify-content-center">

      <div class="col-ld-11 col-lg-1à col-xl-9">

        @titre(['titre' => $observation->intitule, 'icone' => 'modifier.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

          <div class="form-group">

            <label for="intitule">@lang('form.intitule')</label>

            <input id="intitule" class="form-control" type="text" name="intitule" required value="{{ $observation->intitule }}" >

          </div>

          <div class="form-group">

            <label for="explication">@lang('form.explication')</label>

            <input id="explication" class="form-control" type="text" name="explication" required value="{{ $observation->explication }}" >

          </div>

          <div class="form-group">

            <label for="autres">@lang('form.autres_causes')</label>

            <input id="autres" class="form-control" type="text" name="autres" value="{{ $observation->autres }}" >

          </div>


      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-6 col-lg-5 col-xl-5">

        @include('admin.algorithme.inputCategorie')

      </div>

      <div class="col-md-5 col-lg-5 col-xl-4">

        <div class="form-group">

          <label for="ordre">@lang('form.position_liste')</label>

          <input id="ordre" class="form-control" type="number" name="ordre" value="{{ $observation->ordre }}">

        </div>

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @enregistreAnnule(['route' => route('observations.show', $observation->id) ])

      </div>


    </div>

  </form>

</div>

@endsection
