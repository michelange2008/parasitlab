@if ($demande->facture)

  <table class="table">

    <thead>
      <tr>
        <th class="color-bleu" colspan="2">@lang('factures.renvoi')</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>
          <small>{{ $demande->facture->user->name }}</small>
        </td>
        <td id="facture-a-envoyer">
          @include('labo.demandeShow.syntheseRenvoi', ['route' => $route, 'tooltip' => "Renvoyer le facture à l'éleveur"])
        </td>
      </tr>
    </tbody>

  </table>

@endif
