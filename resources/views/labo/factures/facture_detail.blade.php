<div class="table-sm-responsive">

  <table class="table table-sm table-bordered">

    <thead class="thead-bleu-tres-fonce">
      <tr class="text-center">
        <th>@lang('factures.acte')</th>
        <th>@lang('tableaux.pu_ht')</th>
        <th>@lang('tableaux.tva')</th>
        <th>@lang('tableaux.qtt')</th>
        <th>@lang('tableaux.total_ttc')</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($elementDeFacture->anaactes_factures as $anaacte_facture)

        <tr>
          <td>{!! ucfirst($anaacte_facture->anaacte->anatype->nom) !!}&nbsp;: <br> {!! $anaacte_facture->anaacte->nom !!}</td>
          <td class="text-right">{{ number_format($anaacte_facture->pu_ht, 2, ",", " ")}} &euro;</td>
          <td class="text-center">{{ ($anaacte_facture->tva->taux  * 100)." %"}}</td>
          <td class="text-center">{{ $anaacte_facture->nombre }}</td>
          <td class="text-right">{{ number_format($anaacte_facture->pu_ht * $anaacte_facture->nombre, 2, ",", " ")}} &euro;</td>
        </tr>

      @endforeach

      <tr>
        <td colspan="5"></td>
      </tr>

      <tr class="table-bleu-tres-tres-clair font-weight-bolder">
        <td colspan="4">@lang('tableaux.total_ht')</td>
        <td class="text-right">{{ $elementDeFacture->facture->somme_facture->total_ht }}</td>
      </tr>
      @foreach ($elementDeFacture->facture->liste_tvas as $taux => $valeur)

        @if ($valeur != 0)

          <tr class="text-right">
            <td colspan="4">@lang('tableaux.tva')&nbsp;: {{ $taux }}</td>
            <td>{{ $valeur }} &euro;</td>
          </tr>

        @endif

      @endforeach
      <tr class="table-bleu-tres-tres-clair font-weight-bolder">
        <td colspan="4">@lang('tableaux.total_ttc')</td>
        <td class="text-right">{{ $elementDeFacture->facture->somme_facture->total_ttc }}</td>
      </tr>
    </tbody>

  </table>

</div>
