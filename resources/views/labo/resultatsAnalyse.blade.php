@foreach ($demande->prelevements as $prelevement)

  @php

    $toutNegatif = true;

  @endphp

  @foreach ($prelevement->analyse->anaitem as $anaitem)

    @foreach ($prelevement->resultats as $resultat)

      @if ($resultat->anaitem_id = $anaitem->id)

        @php

          $toutNegatif = false;

        @endphp

      @endif

    @endforeach

  @endforeach

  @include('labo.prelevementResultats')

@endforeach
