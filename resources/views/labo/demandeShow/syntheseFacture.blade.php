<table class="table table-hover">
  <tbody>
    <tr>
      <td>
        <small>Destinataire : </small>
      </td>
      <td>
        {{ $demande->facture->user->name}}
      </td>
    </tr>
    <tr>
      @if ($demande->facture->faite)
        <td>
          <small>Montant TTC : </small>
        </td>
        <td>
          <strong>{{ $demande->facture->total_ttc}} € TTC</strong>
        </td>
      @else
        <td class="color-rouge-tres-fonce"><i class="material-icons">warning</i></td>
        <td class="color-rouge-tres-fonce">
          facture non établie
        </td>
      @endif
    </tr>
    @if ($demande->facture->envoyee)
      <tr>
        <td>
          <small>Facture envoyée le </small>
        </td>
        <td>
          @include('fragments.colonneDate', ['date' => $demande->facture->envoyee_date])
        </td>
      </tr>
    @elseif ($demande->facture->faite)
      <tr>
        <td class="color-rouge-tres-fonce"><i class="material-icons">warning</i></td>
        <td class="color-rouge-tres-fonce">
          facture non envoyée
        </td>
      </tr>
    @endif
    @if ($demande->facture->payee)
      <tr class="alert-success">
        <td>
        <small>Facture payée le </small>
        </td>
        <td>
          @include('fragments.colonneDate', ['date' => $demande->facture->payee_date])
        </td>
      </tr>
    @elseif ($demande->facture->envoyee)
      <tr>
        <td class="color-rouge-tres-fonce"><i class="material-icons">warning</i></td>
        <td class="color-rouge-tres-fonce">
          facture non payée
        </td>
      </tr>
    @endif
  </tbody>
</table>
