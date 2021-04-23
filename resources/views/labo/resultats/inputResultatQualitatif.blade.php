{{-- Ligne du tableau de saisie/modification des résultats : est renvoyée par resultatsSaisie.blade.php --}}

{{-- Manipulation destinée à savoir s'il y a déjà un résultat saisie pour cet anaitem et ce prélèvement
Dans ce cas, cette valeur est ajoutée par défaut au champs input avec une modification du style pour qu'on le remarque
Cette modification de style concerne aussi le nom du parasite ce qui explique qu'on retrouve les colonnes parasite et Unité
aussi bien dans inputResultatQuantitatif que inputResultatQualitatif
 --}}
@php

  $valeur = null;
  $class = "";

@endphp

@foreach ($prelevement->resultats as $resultat)

  @if ($resultat->anaitem->id === $anaitem->id)

    @php

      $valeur = $resultat->valeur;
      $class = "resultatExiste"; // destiné à faire une mise en forme particulière pour les résultats non négatifs

    @endphp

  @endif

@endforeach

<tr>

  <td class="{{ $class }}">

    {{$anaitem->nom}}

  </td>

  <td>

    <select class="form-control" name="resultat_{{ $prelevement->id }}_{{ $anaitem->id }}">
      {{-- en fonction de $valeur, cad d'un résultat préexistant on selectionne l'option --}}
        <option value="absence"
          @if ($valeur == "absence") selected="selected" @endif>
            @lang('form.absence')
        </option>

        <option value="presence"
          @if ($valeur == "presence") selected="selected" @endif>
            @lang('form.presence')
        </option>

    </select>

  </td>

  <td class="text-right">

    @lang($anaitem->unite->nom)

  </td>

</tr>
