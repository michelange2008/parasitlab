@foreach ($demande->prelevements as $prelevement)

  @if ($prelevement->toutNegatif)

    @include('labo.resultats.resultatsNegatifs')

  @else

    @include('labo.demandeShow.demandeSerie')

    @include('labo.resultats.resultatsPositifs')

  @endif

@endforeach
