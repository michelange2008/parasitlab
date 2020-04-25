<table class="table table-hover">
  <tbody>
    @if ($demande->toveto)
      <tr>
        <td>
          <small>-> {!! ucfirst('commun.vet') !!}</small>
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
        <small>{!! ucfirst(__('form.date_prelevement')) !!}&nbsp;: </small>
      </td>
      <td>
        @if ($demande->date_prelevement !== null)
          {{ $demande->date_prelevement }}
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
        {{ $demande->date_reception }}
      </td>
    </tr>
    <tr>
      <td>
        <small>@lang('tableaux.date_resultat')&nbsp;: </small>
      </td>
      <td>
        {{-- @if ($demande->date_resultat !== null) --}}
          {{ $demande->date_resultat }}
        {{-- @else --}}
          <span id="inacheve" class="color-rouge-tres-fonce">@lang('demandes.analyse_non_finie')</span>
        {{-- @endif --}}
      </td>
    </tr>
    @if ($demande->date_resultat !== null)
      <tr>
        <td>
          <small>@lang('tableaux.date_envoi')&nbsp;: </small>
        </td>
        <td>
          {{ $demande->date_envoi }}
        </td>
      </tr>
    @endif
  </tbody>
</table>
