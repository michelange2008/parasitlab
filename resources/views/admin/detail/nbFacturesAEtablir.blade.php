@isset($eleveurInfos->nbFacturesAEtablir)

  @if ($eleveurInfos->nbFacturesAEtablir > 0)

      <li class="list-group-item">

        @lang('factures.nbAEtablir')

        <a href="{{ route('factures.createFromUser', [$user->id]) }}" class="badge badge-warning ml-3">

          {{ $eleveurInfos->nbFacturesAEtablir }}

        </a>

        <small>

          (clic pour facturer)
          
        </small>

      </li>

  @endif

@endisset
