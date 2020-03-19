@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-lg-9 col-xl-8">

        @titre(["titre" => __('infoslegales.'.$infoslegales->titre), "icone" => $infoslegales->icone] )

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-lg-9 col-xl-8">

        <p class="lead">{{ __('infoslegales.'.$infoslegales->soustitre) }}</p>

      </div>

      <div class="col-md-10 col-lg-9 col-xl-8">

        @foreach ($infoslegales->blocs as $bloc)

          <h3 class="my-3">{{ __('infoslegales.'.$bloc->titre) }}</h3>

          <ul class="list-group list-group-flush">

            @foreach ($bloc->contenu as $element)

              <li class="list-group-item">{!! __('infoslegales.'.$element) !!}</li>

            @endforeach

            @isset($bloc->image)

              <div class="row justify-content-end">

                <div class="col-2">

                  <img width="100px" src="{{ url('storage/img/icones/'.$bloc->image) }}" alt="{{ $bloc->image }}">

                </div>

              </div>

            @endisset

            <div class="divider-court">

            </div>
          </ul>

        @endforeach

      </div>

    </div>

  </div>

@endsection
