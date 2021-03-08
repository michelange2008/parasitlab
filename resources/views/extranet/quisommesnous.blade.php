{{-- présentation du fibl france et de l'équipe
Est renvoyée par app\Http\Controllers\InfosController@quisommesnous.php --}}
@extends('layouts.app')

@section('menu')

  @include("extranet.menuExtranet")

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @titre(['titre' => __('titres.quisommesnous'), "icone" => 'nouveau.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <div class="row">

          <div class="col-md-6">

            <h4>@lang('quisommesnous.parasitlab.titre')</h4>

            <h5>@lang('quisommesnous.parasitlab.soustitre')</h5>

            <div class="text-justify">

              @lang('quisommesnous.parasitlab.texte')

            </div>

          </div>

          <div class="col-md-6 text-right">
            <figure class="figure">

              <img class="img-fluid" src="{{ url('storage/img/infoaide/quisommesnous/macmaster.jpg') }}" alt="">
              <figcaption class="figure-caption">La lame de MacMaster permet un comptage précis des oeufs de parasites</p>

            </figure>

          </div>

        </div>
        <hr class="divider">

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <h5>@lang('quisommesnous.fibl_local.soustitre')</h5>

      </div>

      <div class="col-md-11 col-lg-10 col-xl-9">

        @foreach ($quisommesnous as $groupes)

          <h4>{{ ucfirst($groupes->groupe) }}</h4>

          <div class="d-flex justify-content-between">

            @foreach ($groupes->personnes as $personne)

              <div class="col-3">

                <figure class="figure m-3">

                  <img class="img-fluid img-200 shadow-lg" style src="{{ url('storage/img/labo/photos/'.$users->where('id', $personne->id)->first()->labo->photo) }}" alt="{{  $users->where('id', $personne->id)->first()->labo->photo }}">

                  <figcaption class="figure-caption pr-4">
                    {{ $users->where('id', $personne->id)->first()->name }}</br>
                    {{ $personne->texte }}
                  </figcaption>

                </figure>

              </div>

            @endforeach

          </div>

        @endforeach

        <hr class="divider">

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        {{-- <div class="row">

          <div class="col-md-7">

            <h4 class='mb-2'>@lang('quisommesnous.groupe_fibl.titre')</h4>

            <h5>@lang('quisommesnous.groupe_fibl.soustitre')</h5>

            @lang('quisommesnous.groupe_fibl.texte')

          </div>

          <div class="col-md-5 text-right">

            <img class="img-fluid" src="{{ url('storage/img/infoaide/quisommesnous/groupe_fibl.jpg.webp') }}" alt="Groupe FiBL">

          </div>

        </div> --}}

        {{-- <h5>@lang('quisommesnous.fibl_parasito.soustitre')</h5>
        @lang('quisommesnous.fibl_parasito.texte') --}}

        </div>

      </div>

    </div>

  </div>

  <div class="row my-3">

  </div>

@endsection
