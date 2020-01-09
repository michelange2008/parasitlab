@php

  $valeur = "";
  $class = "";

@endphp

@foreach ($prelevement->resultats as $resultat)

  @if ($resultat->anaitem->id === $anaitem->id)

    @php

      $valeur = $resultat->valeur;
      $class = "text-success";

    @endphp

  @endif

@endforeach

    <input class="{{ $class }} form-control" type="number" name="resultat_{{ $prelevement->id }}_{{ $anaitem->id }}"
            value="{{ $valeur }}" placeholder="résultat">
