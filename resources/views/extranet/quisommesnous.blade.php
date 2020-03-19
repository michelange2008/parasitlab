@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-xl-8">

        @titre(['titre' => __('quisommesnous.titre'), "icone" => 'nouveau.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-xl-8">

          <ul class="list_unstyled">

            @foreach ($quisommesnous as $element)

              <li class="media my-3">

                <img src="{{ url('storage/img/extranet').'/'.$element->image }}" alt="{{ __($element->titre) }}">

                <div class="media-body ml-3">

                  <h3>{{ __('quisommesnous.'.$element->titre) }}</h3>
                  <h5>{{ __('quisommesnous.'.$element->soustitre) }}</h5>

                  @foreach ($element->contenu as $contenu)

                    <p>{{ __('quisommesnous.'.$contenu) }}</p>

                  @endforeach

                  <a class="btn" href="{{ $element->lien }}">En savoir plus <i class="fas fa-angle-right"></i></a>

                </div>

              </li>

              <hr class="divider">

            @endforeach

          </ul>

      </div>

    </div>

  </div>

@endsection
