<table class="table table-bordered table-hover">

  @include('labo.resultats.titreResultat')

  <tbody>
    @foreach ($prelevement->resultats as $resultat)

        <tr>

          <td>{{ $resultat->anaitem->nom }}</td>

          <td class="text-right">{{ $resultat->valeur }} {{ $resultat->anaitem->unite->nom }}</td>

        </tr>

    @endforeach

    @include('labo.resultats.listeNonDetecte')

  </tbody>

</table>
