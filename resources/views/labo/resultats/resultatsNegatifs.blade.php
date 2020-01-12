<table class="table table-bordered">

  @include('labo.resultats.titreResultat')

  <tbody>

    <tr>

      <td class="ml-3 lead color-bleu-tres-fonce">

        <i class="material-icons">sentiment_very_satisfied</i> Aucun parasite recherché n'a été identifié

      </td>

    </tr>

    @include('labo.resultats.listeNonDetecte')

  </tbody>

</table>
