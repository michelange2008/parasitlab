@isset($eleveurInfos->troupeaux)

  @if ($eleveurInfos->troupeaux->count() > 0)

    <a href="{{ route('troupeau.troupeauxUnEleveur', $eleveurInfos->user->id) }}">

      <li class="list-group-item">

        Troupeaux:

        @foreach ($eleveurInfos->troupeaux as $troupeau)
          {{ $troupeau->nom }}
          @if (!$loop->last)
            ,
          @endif

        @endforeach

        <i class="fas fa-chevron-right mr3"></i>

      </li>

    </a>

  @endif

@endisset
