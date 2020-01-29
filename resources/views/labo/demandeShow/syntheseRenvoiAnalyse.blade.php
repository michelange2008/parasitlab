@if ($demande->date_resultat !== null)
  <table class="table">

    <thead class="alert-bleu">
      <tr>
        <th colspan="2">Renvoyer les résultats</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td><small>{{ $demande->user->name }}</small></td>
        <td class="a-envoyer" destinataire="{{ $demande->user_id }}">
          @include('labo.demandeShow.syntheseRenvoi', ['tooltip' => "Renvoyer les résultats à l'éleveur"])
        </td>
      </tr>
      @if ($demande->toveto)
        <tr>
          <td>{{ $demande->veto->user->name }}</td>
          <td class="a-envoyer" destinataire="{{ $demande->veto->user->id }}">
            @include('labo.demandeShow.syntheseRenvoi', ['tooltip' => "Renvoyer les résultats au vétérinaire"])
          </td>
        </tr>
      @endif
    </tbody>

  </table>
@endif
