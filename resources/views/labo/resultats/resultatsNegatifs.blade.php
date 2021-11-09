<table class="table table-bordered">

  @if ($prelevement->estMelange)

    @include('labo.resultats.titreResultat', [
      'titre' => $prelevement->melange->nom,
      'prelevement' => $prelevement
    ])

  @else

    @include('labo.resultats.titreResultat', [
      'titre' => $prelevement->animal->nom ?? $prelevement->animal->numero,
      'prelevement' => $prelevement
    ])

  @endif

  <tbody>

    <tr>

      <td class="ml-3 lead color-bleu-tres-fonce">

        <i class="fas fa-smile"></i> @lang('demandes.0_resultat')

      </td>

    </tr>

    @include('labo.resultats.listeNonDetecte')

  </tbody>

</table>
