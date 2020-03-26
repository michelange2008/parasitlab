@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-xl-8">

        @titre(['titre' => __($elements->fichier.'.'.$elements->titre), 'icone' => 'eleveur.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-xl-8">

          <ul class="list-unstyled">

            @foreach ($elements->contenu as $contenu)

              <li class="media my-3">

                <img src="{{ url('storage/img').'/'.$contenu->image }}" alt="Troupeaux">

                <div class="media-body ml-3">

                  <h4>{{ __($elements->fichier.$contenu->bloc.$elements->soustitre) }}</h4>

                  @for ($i = 1; $i < $contenu->nb_ligne+1 ; $i++)

                    <p class="mb-1">{!! __($elements->fichier.$contenu->bloc.$elements->prefixe.$i) !!}</p>

                  @endfor

                </div>

              </li>

              <hr class="divider-court">

            @endforeach

          </ul>

          <hr class="divider-court">

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
