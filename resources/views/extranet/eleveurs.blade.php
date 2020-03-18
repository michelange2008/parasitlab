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

            @foreach ($elements->contenu as $contenu)

              <li class="media my-3">

                @if ($contenu->image_gauche)

                  <img src="{{ url('storage/img').'/'.$contenu->image }}" alt="Troupeaux">

                @endif

                <div class="media-body ml-3">

                  <h4>{{ __('presentation.'.$contenu->titre) }}</h4>

                  @foreach ($contenu->texte as $texte)

                    <p>{{ $texte }}</p>

                  @endforeach


                </div>

                @if (!$contenu->image_gauche)

                  <img src="{{ url('storage/img').'/'.$contenu->image }}" alt="Troupeaux">

                @endif

              </li>

            @endforeach

          </ul>

          <hr class="divider">

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-xl-8">

        <div class="card-deck">

          @include('extranet.commentfaireautre')

          @include('extranet.contacteznous')

        </div>

      </div>

    </div>

  </div>

@endsection
