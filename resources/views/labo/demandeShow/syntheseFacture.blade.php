<table class="table table-hover">
  <tbody>
    <tr>
      <td>
        <small>@lang('factures.dest')&nbsp;: </small>
      </td>
      <td>
        {{ $demande->userfact->name}}
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
        <td class="color-rouge-tres-fonce text-left pl-0" colspan="2">
          <a class="btn btn-bleu btn-sm" href="{{ route('factures.createDemandeFromUser',
            [
              $demande->userfact_id,
              $demande->id,
            ]) }}">
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
          {{ \Carbon\Carbon::parse($facture->envoyee_date)->isoFormat('LL') }}
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
          {{ \Carbon\Carbon::parse($facture->payee_date)->isoFormat('LL') }}
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
