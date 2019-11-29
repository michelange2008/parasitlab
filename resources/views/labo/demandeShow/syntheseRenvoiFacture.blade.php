@if ($demande->facture->faite)
  <table class="table">

    <thead class="alert-bleu">
      <tr>
        <th colspan="2">Renvoyer la facture</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>
          <small>{{ $demande->facture->user->name }}</small>
        </td>
        <td>
          @include('labo.demandeShow.syntheseRenvoi', ['route' => $route, 'tooltip' => "Renvoyer le facture à l'éleveur"])
        </td>
      </tr>
    </tbody>

  </table>
@endif
