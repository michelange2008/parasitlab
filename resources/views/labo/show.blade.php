@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-4">

        {{-- INFORMATIONS SUR L'ELEVEUR --}}

        @include('fragments.eleveurDetail')

      </div>

{{-- RESULTATS D'ANALYSE --}}
      <div class="col-md-8">

        @isset($serie)

            @serieShow()

        @endisset

        @isset($demande)

            @demandeShow()

        @endisset

      </div>

    </div>

  </div>
@endsection
