  <div class="row justify-content-center">
    <div class="col-md-12 d-inline-flex alert alert-bleu rounded-0 @if(!$serie->acheve) alert-rouge-tres-fonce @endif">
      @include('labo.serieShow.titreSerie', ['serie' => $serie])
    </div>
  </div>
@if ($serie->acheve)

  @if ($serieInfos->identique)

    <div class="row justify-content-center">
      <div class="col-md-10">
        @include('labo.serieShow.detailIdentique', [
          'serie'=> $serie,
          'serieInfos' => $serieInfos,
        ])
      </div>
    </div>

  @else

    <div class="row justify-content-center">
      <div class="col-md-10">
        @include('labo.serieShow.detailDifferent', ['serie' => $serie])
      </div>
    </div>

  @endif

@else

  serie inachevée

@endif
