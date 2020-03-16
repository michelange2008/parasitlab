@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-xl-8">

        @titre(['titre' => __('presentation.'.$elements->titre), 'icone' => 'eleveur.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-xl-8">

          <ul class="list-unstyled">

            @foreach ($elements->texte as $element)

              <li class="media my-3">

                @if ($element->image_gauche)

                  <img src="{{ url('storage/img').'/'.$element->image }}" alt="Troupeaux">

                @endif

                <div class="media-body ml-3">

                  <h4>{{ __('presentation.'.$element->titre) }}</h4>

                  <p>{{ $element->texte_1 }}</p>

                </div>

                @if (!$element->image_gauche)

                  <img src="{{ url('storage/img').'/'.$element->image }}" alt="Troupeaux">

                @endif

              </li>

            @endforeach

          </ul>

      </div>

    </div>

  </div>

@endsection
