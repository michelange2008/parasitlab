@isset($eleveurInfos->factureImpayees)

  @if ($eleveurInfos->factureImpayees > 0)

    <li class="list-group-item">

      @lang('factures.nbImpaye') <span class="badge badge-danger ml-3">{{ $eleveurInfos->factureImpayees }}</span>

    </li>

  @endif

@endisset
