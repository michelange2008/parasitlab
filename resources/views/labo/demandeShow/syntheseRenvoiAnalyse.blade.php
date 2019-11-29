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
        <td>
          @include('labo.demandeShow.syntheseRenvoi', ['route' => $route, 'tooltip' => "Renvoyer les résultats à l'éleveur"])
        </td>
      </tr>
      @if ($demande->toveto)
        <tr>
          <td>{{ $demande->veto->user->name }}</td>
          <td>
            @include('labo.demandeShow.syntheseRenvoi', ['route' => $route, 'tooltip' => "Renvoyer les résultats au vétérinaire"])
            </a>
          </td>
        </tr>
      @endif
    </tbody>

  </table>
@endif
