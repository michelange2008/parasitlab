<table class="table table-bordered table-hover">

  @include('labo.resultats.titreResultat', [
    'titre' => $prelevement->animal->nom ?? $prelevement->identification,
    'soustitre' => $prelevement->animal->numero ?? '',
  ])

  <tbody>
    @foreach ($prelevement->resultats as $resultat)

      @if ($resultat->positif)

        <tr>

          <td>{{ $resultat->anaitem->nom }}</td>

          <td class="text-right">{{ $resultat->valeur }} @lang($resultat->anaitem->unite->nom) </td>

        </tr>

      @endif

    @endforeach

    @if ($prelevement->nonDetecte->count() > 0)

      @include('labo.resultats.listeNonDetecte')

    @endif

  </tbody>

</table>
