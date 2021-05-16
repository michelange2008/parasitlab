{{-- Ligne du tableau de saisie/modification des résultats : est renvoyée par resultatsSaisie.blade.php --}}

{{-- Manipulation destinée à savoir s'il y a déjà un résultat saisie pour cet anaitem et ce prélèvement
Dans ce cas, cette valeur est ajoutée par défaut au champs input avec une modification du style pour qu'on le remarque
Cette modification de style concerne aussi le nom du parasite ce qui explique qu'on retrouve les colonnes parasite et Unité
aussi bien dans inputResultatQuantitatif que inputResultatQualitatif
 --}}
@php

  $valeur = ""; // création de variable sans contenu
  $class = "";

@endphp

@foreach ($prelevement->resultats as $resultat) {{-- On passe en revu les résultats déjà existants de ce prélèvement--}}

  @if ($resultat->anaitem->id === $anaitem->id) {{-- Si l'anaitem est le même , c'est à dire si une valeur à déjà été saisie
    pour ce prélèvement et ce parasite --}}

    @php

      $valeur = intval($resultat->valeur); // on associe cette valeur à la variable $valeur
      $class = "resultatExiste"; // on utilise la classe resultatExiste pour mettre en évidence cette ligne

    @endphp

  @endif

@endforeach

<tr>

  <td class="{{ $class }}">

    {{$anaitem->nom}}

  </td>

  <td>
    <div class="form-group row px-3 justify-content-left">

      <input id="saisie_{{ $prelevement->id }}-{{ $anaitem->id }}"
        class="saisie {{ $class }} form-control col-md-7 mr-3"
        type="number" min=0
        name="resultat_{{ $prelevement->id }}_{{ $anaitem->id }}"
        mult="{{ $anaitem->multiple }}"
        @if (is_int($valeur) && $valeur > 0)
          value="{{ $valeur/$anaitem->multiple }}"
        @else
          value=""
        @endif
        placeholder="@lang('form.result')">

      <input id="result_{{ $prelevement->id }}-{{ $anaitem->id }}"
        class="result {{ $class }} form-control col-3 mx-3 d-none d-md-block"
        type="text" min=0
        name="resultat_{{ $prelevement->id }}_{{ $anaitem->id }}"
        @if (is_int($valeur) && $valeur > 0)
          value="{{ $valeur }}"
        @else
          value=""
        @endif
        disabled>

    </div>

  </td>

  <td class="text-right">

          @lang($anaitem->unite->nom)

  </td>

</tr>

@section('scripts')

<script src="{{url('js/inputResultatValeur.js')}}"></script>

@endsection
