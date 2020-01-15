
@include('labo.serieShow.titreSerie')

@if ($serie->acheve)

  @if ($serieInfos->identique)

        @include('labo.serieShow.detailIdentique')

  @else

        @include('labo.serieShow.detailDifferent')

  @endif

@else

  @include('labo.serieShow.serieInacheve')

@endif
