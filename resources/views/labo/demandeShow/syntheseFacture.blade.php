<table class="table table-hover">
  <tbody>
    <tr>
      <td>
        <small>@lang('factures.dest')&nbsp;: </small>
      </td>
      <td>
        {{ ($demande->user_dest_fact) ? $demande->user->name : $demande->veto->user->name}}
      </td>
    </tr>
    <tr>
      @if ($demande->facturee)
        <td>
          <small>@lang('tableaux.total_ttc')&nbsp;: </small>
        </td>
        <td>
          <strong>{{ $facture->somme_facture->total_ttc}}&nbsp;@lang('factures.ttc')</strong>
        </td>
      @elseif ($demande->acheve)
        <td class="color-rouge-tres-fonce text-center" colspan="2">
          <a class="btn btn-bleu btn-sm" href="{{ route('factures.createFromUser', ($demande->user_dest_fact) ? $demande->user->id : $demande->veto->user->id) }}">
            @lang('factures.faire_facture')
          </a>
        </td>
      @endif
    </tr>
    @if ($demande->facturee && $demande->facture->envoyee)
      <tr>
        <td>
          <small>@lang('factures.facture_envoyee_le')</small>
        </td>
        <td>
          @include('fragments.dateFr', ['date' => $demande->facture->envoyee_date])
        </td>
      </tr>
    @elseif ($demande->facturee)
      <tr>
        <td class="color-rouge-tres-fonce"><i class="fas fa-exclamation-triangle"></i></td>
        <td class="color-rouge-tres-fonce">
          @lang('factures.facture_non_envoyee')
        </td>
      </tr>
    @endif
    @if ($demande->facturee && $demande->facture->payee)
      <tr class="alert-success">
        <td>
        <small>@lang('factures.facture_payee_le')</small>
        </td>
        <td>
          @include('fragments.dateFr', ['date' => $demande->facture->payee_date])
        </td>
      </tr>
    @elseif ($demande->facturee && $demande->facture->envoyee)
      <tr>
        <td class="color-rouge-tres-fonce"><i class="fas fa-exclamation-triangle"></i></td>
        <td class="color-rouge-tres-fonce">
          @lang('factures.facture_non_payee')
        </td>
      </tr>
    @endif
  </tbody>
</table>
