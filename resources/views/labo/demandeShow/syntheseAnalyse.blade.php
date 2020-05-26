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
    @if ($demande->toveto)
      <tr>
        <td>
          <small>-> {!! ucfirst(__('form.vet')) !!}</small>
        </td>
        <td>
          <small><a href="{{ route('vetoAdmin.show', $demande->veto_id)}}">
            {{ $demande->veto->user->name}}
          </a></small>
        </td>
      </tr>
    @endif

    <tr>
      <td>
        <small>@lang('tableaux.date_resultat')&nbsp;: </small>
      </td>
      <td>
        @if ($demande->date_resultat !== null)
          {{ \Carbon\Carbon::parse($demande->date_resultat)->isoFormat('LL') }}
        @else
          <span id="inacheve" class="color-rouge-tres-fonce">@lang('demandes.analyse_non_finie')</span>
        @endif
      </td>
    </tr>
    @if ($demande->date_resultat !== null)
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
