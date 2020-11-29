<table class="table table-bordered table-hover">

  @include('labo.resultats.titreResultat', [
    'titre' => $prelevement->animal->nom,
    'soustitre' => $prelevement->animal->numero,
    'nouveau' => false,
  ])

  <tbody>
    @foreach ($prelevement->resultats as $resultat)

        <tr>

          <td>{{ $resultat->anaitem->nom }}</td>

          <td class="text-right">{{ $resultat->valeur }} @lang($resultat->anaitem->unite->nom) </td>

        </tr>

    @endforeach

    @if (count($prelevement->nonDetecte) > 0)

      @include('labo.resultats.listeNonDetecte')

    @endif

  </tbody>

</table>
