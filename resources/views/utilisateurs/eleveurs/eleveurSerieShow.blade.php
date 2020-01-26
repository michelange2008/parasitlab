@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-8 col-lg-6">

        @include('utilisateurs.eleveurs.titreEleveurSerie')

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-8 col-lg-6">

        @if ($serie->acheve)

          @if ($serieInfos->identique)

                @include('labo.serieShow.detailIdentique')

          @else

                @include('labo.serieShow.detailDifferent')

          @endif

        @else

          @include('labo.serieShow.serieInacheve')

        @endif

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-8 col-lg-6">

        @include('fragments.boutonUser', [
          'route' => 'eleveur',
          'id' => '',
          'couleur' => 'btn-secondary',
          'intitule' => 'Retour',
        ])

      </div>

    </div>

  </div>



@endsection
