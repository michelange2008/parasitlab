@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form action="{{ route('observations.update', $observation->id) }}" method="post">

      @csrf
      @method('put')
      {{-- Champs caché qui permet de savoir quel type demodification on apporte à l'observatin --}}
      <input type="hidden" name="type" value="option">

      <div class="row my-3 justify-content-center">

        <div class="col-ld-11 col-lg-1à col-xl-9">

          @titre(['titre' => $observation->intitule, 'icone' => 'modifier.svg'])

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          @foreach ($options as $option)

            <div class="custom-control custom-checkbox">

              <input type="checkbox" class="custom-control-input" id="{{ $option->abbreviation }}" name="option_{{ $option->id }}"

                @if ($observation->options->contains($option))

                  checked

                @endif

              >

              <label class="custom-control-label lead color-bleu-tres-fonce" for="{{ $option->abbreviation }}">{{ $option->nom }}</label>

              <p class="ml-3">{{ $option->titre }}</p>
              
            </div>

          @endforeach

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          @enregistreAnnule(['route' => route('observations.show', $observation->id)])

        </div>

      </div>

    </form>
  </div>

@endsection
