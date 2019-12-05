@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')
<div class="container-fluid">

  <div class="row justify-content-center my-3">
    <div class="col-md-8 d-inline-flex alert alert-bleu rounded-0 @if(!$serie->acheve) alert-rouge-tres-fonce @endif">
      @include('labo.serieShow.titreSerie', ['serie' => $serie])
    </div>
  </div>
@if ($serie->acheve)

  @if ($identique)

    <div class="row justify-content-center">
      <div class="col-md-8">
        @include('labo.serieShow.detailIdentique', [
          'serie'=> $serie,
          'titres' => $titres,
          'valeurs' => $valeurs,
        ])
      </div>
    </div>

  @else

    <div class="row justify-content-center">
      <div class="col-md-8">
        @include('labo.serieShow.detailDifferent', ['serie' => $serie])
      </div>
    </div>

  @endif

@else



@endif

</div>
@endsection
