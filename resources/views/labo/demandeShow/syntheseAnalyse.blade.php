<table class="table table-hover">
  <tbody>

    <tr>
      <td>
        <small>{!! ucfirst(__('form.date_prelevement')) !!}&nbsp;: </small>
      </td>
      <td>
        @if ($demande->date_prelevement !== null)
          {{ \Carbon\Carbon::parse($demande->date_prelevement)->isoFormat('LL') }}
        @else
          ?
        @endif
      </td>
    </tr>
    <tr>
      <td>
        <small>@lang('form.date_reception')&nbsp;:</small>
      </td>
      <td>
        {{ \Carbon\Carbon::parse($demande->date_reception)->isoFormat('LL') }}
      </td>
    </tr>
    @if ($demande->tovetouser_id != null)
      <tr>
        <td>
          <small>-> {!! ucfirst(__('form.vet')) !!}</small>
        </td>
        <td>{{-- ATTENTION DANS LE CAS D'UNE DEMANDE le véto destin est nommé par un user_id --}}
          <small><a href="{{ route('vetoAdmin.show', $demande->tovetouser->id)}}">
            {{ $demande->tovetouser->name}}
          </a></small>
        </td>
      </tr>
    @endif

    @if ($demande->informations != null)
      <tr>
        <td colspan=2>
          <p><strong>@lang('demandes.analyse_infos')</strong></p>
          <small>{{ $demande->informations }}</small>
        </td>
      </tr>
    @endif

    <tr>
      <td>
        <small>@lang('tableaux.date_resultat')&nbsp;: </small>
      </td>
      <td>
        @if ($demande->acheve)
          {{ \Carbon\Carbon::parse($demande->date_resultat)->isoFormat('LL') }}
        @else
          <span id="inacheve" class="color-rouge-tres-fonce">@lang('demandes.analyse_non_finie')</span>
        @endif
      </td>
    </tr>
    @if ($demande->signe)
      <tr>
        <td>
          <small>@lang('tableaux.date_signature')&nbsp;: </small>
        </td>
        <td>
          {{ \Carbon\Carbon::parse($demande->date_signature)->isoFormat('LL') }}
        </td>
      </tr>
    @endif
    @if ($demande->envoye)
      <tr>
        <td>
          <small>@lang('tableaux.date_envoi')&nbsp;: </small>
        </td>
        <td>
          {{ \Carbon\Carbon::parse($demande->date_envoi)->isoFormat('LL') }}
        </td>
      </tr>
    @endif
  </tbody>
</table>
