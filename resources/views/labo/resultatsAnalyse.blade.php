@include('labo.demandeShow.demandeSerie')

@foreach ($demande->prelevements as $prelevement)

  @if ($demande->acheve)

    @if ($prelevement->toutNegatif)

      @include('labo.resultats.resultatsNegatifs')

    @else

      @include('labo.resultats.resultatsPositifs')

    @endif

  @else

    @include('labo.resultats.resultatsPositifs')

  @endif


@endforeach

@include('labo.prelevements.prelevementNonRenseigne')


@include('labo.resultats.commentaire')
