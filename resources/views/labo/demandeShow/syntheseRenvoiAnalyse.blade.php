@if ($demande->date_resultat !== null)
  <table class="table">

    <thead class="alert-bleu">
      <tr>
        <th colspan="2">@lang('demandes.resend_results')</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td><small>{{ $demande->user->name }}</small></td>
        <td class="a-envoyer" destinataire="{{ $demande->user_id }}" type="single">
          @include('labo.demandeShow.syntheseRenvoi', ['tooltip' => __('demandes.resend_eleveur')])
        </td>
      </tr>
      @if ($demande->toveto)
        <tr>
          <td>{{ $demande->veto->user->name }}</td>
          <td class="a-envoyer" destinataire="{{ $demande->veto->user->id }}" type="single">
            @include('labo.demandeShow.syntheseRenvoi', ['tooltip' => __('demandes.resend_veto')])
          </td>
        </tr>
      @endif
    </tbody>

  </table>
@endif
