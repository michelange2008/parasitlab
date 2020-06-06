@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-ld-11 col-lg-1à col-xl-9">

        @include('fragments.flash')

        @titre(['titre' => $observation->intitule, 'icone' => 'modifier.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <form action="{{ route('observations.update', $observation->id) }}" method="post">

          @csrf
          @method('put')
          {{-- Champs caché qui permet de savoir quel type demodification on apporte à l'observatin --}}
          <input type="hidden" name="type" value="animal">

          @include('admin.algorithme.inputAnimal')

          @enregistreAnnule(['route' => route('observations.show', $observation->id)])

        </form>


      </div>

    </div>

  </div>

@endsection
