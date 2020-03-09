<div class="table-sm-responsive">

  <table class="table table-bordered">

    <thead class="thead-dark">
      <tr class="text-center">
        <th>Acte</th>
        <th>P.U. HT</th>
        <th>TVA</th>
        <th>Qtt</th>
        <th>Prix total</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($anaactes_factures as $anaacte_facture)

        <tr>
          <td>{{ ucfirst($anaacte_facture->anaacte->nom) }}</td>
          <td class="text-right">{{ number_format($anaacte_facture->pu_ht, 2, ",", " ")." €" }}</td>
          <td class="text-center">{{ ($anaacte_facture->tva->taux  * 100)." %"}}</td>
          <td class="text-center">{{ $anaacte_facture->nombre }}</td>
          <td class="text-right">{{ number_format($anaacte_facture->pu_ht * $anaacte_facture->nombre, 2, ",", " "). " €" }}</td>
        </tr>

      @endforeach

      <tr>
        <td colspan="5"></td>
      </tr>

      <tr class="table-secondary font-weight-bolder">
        <td colspan="4">Totalt HT</td>
        <td class="text-right">{{ $facture_completee->somme_facture->total_ht }}</td>
      </tr>
      @foreach ($facture_completee->liste_tvas as $taux => $valeur)

        @if ($valeur != 0)

          <tr class="text-right">
            <td colspan="4">TVA à {{ $taux }}</td>
            <td>{{ $valeur }}</td>
          </tr>

        @endif

      @endforeach
      <tr class="table-secondary font-weight-bolder">
        <td colspan="4">Total TTC</td>
        <td class="text-right">{{ $facture_completee->somme_facture->total_ttc }}</td>
      </tr>
    </tbody>

  </table>

</div>
