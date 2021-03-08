<div class="col-md-3 bd-sidebar my-3 d-none d-md-block">

  <h4 class="bg-rouge p-3">@lang('parasitisme.sujets_perm')</h4>

  <ul class="list-group list-group-flush mb-3">

    @foreach ($fondamentaux as $sujet)

      <li class="list-group-item">

        <a href="{{ route('parasitisme.fondamentaux', $sujet->id) }}">@lang($sujet->theme)</a>

      </li>

    @endforeach

  </ul>

  <hr class="divider">

  <h4 class="mt-3 bg-rouge p-3">@lang('parasitisme.sujet_cherche')</h4>

  <p class="text-muted small">Vous pouvez rechercher les articles par mot-clef en cliquant sur un des mots-clefs ci-dessous.</p>

  <hr class="divider">

  <p>Mots-clefs</p>
  @foreach ($motclefs as $motclef)

    <span class="color-bleu-tres-fonce my-3" style="font-size: {{ 0.4 + 0.3 * $motclef->blogs->count() }}rem">

      <a id="motclef_{{ $motclef->id }}" class="motclef px-1" href="">

        @if ($loop->last)

          {{ $motclef->motclef }}.

        @elseif ($loop->first)

          {{ ucfirst($motclef->motclef) }},

        @else

          {{ $motclef->motclef }},

        @endif

      </a>

    </span>

  @endforeach

  <hr class="divider">

  <button id="blogs_retablir" class="btn btn-sm btn-bleu" style="display:none">Afficher tous les articles</button>


</div>
