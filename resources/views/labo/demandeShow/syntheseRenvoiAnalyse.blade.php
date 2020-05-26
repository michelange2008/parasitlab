@if ($demande->date_resultat !== null)
  <table id="renvoyer_resultats" class="table" style="display:none">

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
      @if ($demande->toveto)
        <tr>
          <td><small>{{ $demande->veto->user->name }}</small></td>
          <td class="a-envoyer" demande="{{ $demande->id }}" destinataire="{{ $demande->veto->user->id }}" type="single">
            @include('labo.demandeShow.syntheseRenvoi', ['tooltip' => __('demandes.resend_veto')])
          </td>
        </tr>
      @endif
    </tbody>

  </table>
@endif
