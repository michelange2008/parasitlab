@if ($demande->signe)
  <table id="renvoyer_resultats" class="table">

    <thead>
      <tr>
        <th class="color-bleu" colspan="2">@lang('demandes.resend_results')</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td><small>{{ $demande->user->name }}</small></td>
        <td class="a-envoyer" demande="{{ $demande->id }}" destinataire="{{ $demande->user_id }}" type="single">
          @include('labo.demandeShow.syntheseRenvoi', ['tooltip' => __('demandes.resend_eleveur')])
        </td>
      </tr>
      @if ($demande->tovetouser_id != null)
        <tr>
          <td><small>{{ $demande->tovetouser->name }}</small></td>
          <td class="a-envoyer" demande="{{ $demande->id }}" destinataire="{{ $demande->tovetouser->id }}" type="single">
            @include('labo.demandeShow.syntheseRenvoi', ['tooltip' => __('demandes.resend_veto')])
          </td>
        </tr>
      @endif
    </tbody>

  </table>
@endif
