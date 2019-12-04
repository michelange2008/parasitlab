@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')
<div class="container-fluid">

  <div class="row justify-content-center my-3">
      @include('labo.serieShow.titreSerie', ['serie' => $serie])
  </div>
@if ($serie->acheve)

  @if ($identique)

    <div class="row justify-content-center">
      <div class="col-md-8">
        @include('labo.serieShow.detailIdentique', [
          'serie'=> $serie,
          'titres' => $titres,
          'valeurs' => $valeurs,
          'nb_prelevements' => $nb_prelevements
        ])
      </div>
    </div>

  @endif

  <div class="row">
    <div class="col-md-8">
      @include('labo.serieShow.detailDifferent')
    </div>
  </div>

@else

@endif

</div>
@endsection
