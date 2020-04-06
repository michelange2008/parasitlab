<table class="table table-hover">
  <tbody>
    <tr>
      <td>
        <small>Destinataire : </small>
      </td>
      <td>
        {{ ($demande->user_dest_fact) ? $demande->user->name : $demande->veto->user->name}}
      </td>
    </tr>
    <tr>
      @if ($demande->facturee)
        <td>
          <small>Montant TTC : </small>
        </td>
        <td>
          <strong>{{ $demande->facture->total_ttc}} € TTC</strong>
        </td>
      @elseif ($demande->acheve)
        <td class="color-rouge-tres-fonce text-center" colspan="2">
          <a class="btn btn-bleu btn-sm" href="{{ route('factures.createFromUser', ($demande->user_dest_fact) ? $demande->user->id : $demande->veto->user->id) }}">
            Etablir la facture
          </a>
        </td>
      @endif
    </tr>
    @if ($demande->facturee && $demande->facture->envoyee)
      <tr>
        <td>
          <small>Facture envoyée le </small>
        </td>
        <td>
          @include('fragments.dateFr', ['date' => $demande->facture->envoyee_date])
        </td>
      </tr>
    @elseif ($demande->facturee && $demande->facture->faite)
      <tr>
        <td class="color-rouge-tres-fonce"><i class="fas fa-exclamation-triangle"></i></td>
        <td class="color-rouge-tres-fonce">
          facture non envoyée
        </td>
      </tr>
    @endif
    @if ($demande->facturee && $demande->facture->payee)
      <tr class="alert-success">
        <td>
        <small>Facture payée le </small>
        </td>
        <td>
          @include('fragments.dateFr', ['date' => $demande->facture->payee_date])
        </td>
      </tr>
    @elseif ($demande->facturee && $demande->facture->envoyee)
      <tr>
        <td class="color-rouge-tres-fonce"><i class="fas fa-exclamation-triangle"></i></td>
        <td class="color-rouge-tres-fonce">
          facture non payée
        </td>
      </tr>
    @endif
  </tbody>
</table>
