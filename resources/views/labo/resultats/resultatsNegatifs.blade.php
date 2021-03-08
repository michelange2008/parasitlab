<table class="table table-bordered">

  @include('labo.resultats.titreResultat', [
    'titre' => $prelevement->animal->nom ?? $prelevement->identification,
    'soustitre' => $prelevement->animal->numero ?? '',
  ])

  <tbody>

    <tr>

      <td class="ml-3 lead color-bleu-tres-fonce">

        <i class="fas fa-smile"></i> @lang('demandes.0_resultat')

      </td>

    </tr>

    @include('labo.resultats.listeNonDetecte')

  </tbody>

</table>
