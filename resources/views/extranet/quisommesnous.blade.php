@extends('layouts.app')

@section('menu')

  @include("extranet.menuExtranet")

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-xl-8">

        @titre(['titre' => __('titres.quisommesnous'), "icone" => 'nouveau.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-xl-8">

          <ul class="list_unstyled">

            @foreach ($quisommesnous as $element)

              <li class="media my-3">

                <img class="shadow-lg" src="{{ url('storage/img/extranet').'/'.$element->image }}" alt="{{ __($element->prefixe.'titre') }}">

                <div class="media-body ml-3">

                  <h3>@lang($element->prefixe.'titre')</h3>
                  <h5>@lang($element->prefixe.'soustitre')</h5>

                  @lang($element->prefixe.'texte')

                  <a class="btn" href="{{ $element->lien }}">@lang('commun.know_more') <i class="fas fa-angle-right"></i></a>

                </div>

              </li>

              <hr class="divider">

            @endforeach

          </ul>

      </div>

    </div>

  </div>

@endsection
