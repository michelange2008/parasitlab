@foreach ($demande->prelevements as $prelevement)

{{-- BON JE SAIS ! ON NE DOIT PAS FAIRE ÇA DANS UNE VUE... MAIS JE N'AVAIS PAS D'AUTRE SOLUTION POUR
VERIFIER QUE TOUS LES ITEMS D'UN PRELEVEMENT SONT NÉGATIFS --}}

  @php

    $toutNegatif = true;

  @endphp

  @foreach ($prelevement->resultats as $resultat)

    @if ($resultat->positif)

      @php

        $toutNegatif = false;

      @endphp

    @endif

  @endforeach

  @include('labo.prelevementResultats', ['toutNegatif' => $toutNegatif])

@endforeach
