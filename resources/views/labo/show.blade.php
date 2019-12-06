@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-4 sm-4">

        {{-- INFORMATIONS SUR L'ELEVEUR --}}

        @include('fragments.eleveurDetail', [
          'user' => $user,
          'eleveurInfos' => $eleveurInfos,
        ])

      </div>

{{-- RESULTATS D'ANALYSE --}}
      <div class="col-md-8">

        @isset($serie)

            @include('labo.serieShow', [
              'serie' => $serie,
              'serieInfos' => $serieInfos,
            ])

        @else

          autre chose

        @endisset

      </div>

    </div>

  </div>
@endsection
