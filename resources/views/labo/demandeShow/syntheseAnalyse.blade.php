<table class="table table-hover">
  <tbody>
    @if ($demande->toveto)
      <tr>
        <td>
          <small>-> Vétérinaire</small>
        </td>
        <td>
          <a href="{{ route('vetoAdmin.show', $demande->veto_id)}}">
            <strong>{{ $demande->veto->user->name}}</strong>
          </a>
        </td>
      </tr>
    @endif

    <tr>
      <td>
        <small>Date de prélèvement : </small>
      </td>
      <td>
        @if ($demande->date_prelevement !== null)
          {{ $demande->date_prelevement }}
        @else
          NC
        @endif
      </td>
    </tr>
    <tr>
      <td>
        <small>Date de réception :</small>
      </td>
      <td>
        {{ $demande->date_reception }}
      </td>
    </tr>
    <tr>
      <td>
        <small>Date de resultats : </small>
      </td>
      <td>
        @if ($demande->date_resultat !== null)
          {{ $demande->date_resultat }}
        @else
          <span class="color-rouge-tres-fonce">Analyses non terminées</span>
        @endif
      </td>
    </tr>
    @if ($demande->date_resultat !== null)
      <tr>
        <td>
          <small>Date d'envoi : </small>
        </td>
        <td>
          {{ $demande->date_envoi }}
        </td>
      </tr>
    @endif
  </tbody>
</table>
