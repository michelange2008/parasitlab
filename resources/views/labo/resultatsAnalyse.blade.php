@foreach ($demande->prelevements as $prelevement)

  @if ($prelevement->toutNegatif)

    @include('labo.resultats.resultatsNegatifs')

  @else

    @if ($demande->serie_id !== null)

      Cette demande fait partie d'une série de X prélèvement achevée

    @endif

    @include('labo.resultats.resultatsPositifs')

  @endif

@endforeach
