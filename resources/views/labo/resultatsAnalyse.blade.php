@include('labo.demandeShow.demandeSerie')

@foreach ($demande->prelevements as $prelevement)

  @if ($prelevement->toutNegatif)

    @include('labo.resultats.resultatsNegatifs')

  @else

    @include('labo.resultats.resultatsPositifs')

  @endif

@endforeach
