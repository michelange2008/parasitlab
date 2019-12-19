@isset($eleveurInfos->factureImpayees)
  @if ($eleveurInfos->factureImpayees > 0)
    <li class="list-group-item">
      Nombre de factures impayées <span class="badge badge-danger ml-3">{{ $eleveurInfos->factureImpayees }}</span>
    </li>
  @endif
@endisset
