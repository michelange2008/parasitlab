<div class="col-md-3 bd-sidebar my-3 d-none d-md-block">

  <h4 class="bg-rouge p-3">Sujets permanents</h4>

  <ul class="list-group list-group-flush mb-3">

    @foreach ($fondamentaux as $sujet)

      <li class="list-group-item">

        <a href="{{ route('parasitisme.fondamentaux', $sujet->id) }}">{{$sujet->theme}}</a>

      </li>

    @endforeach

  </ul>

  <hr class="divider">

  <h4 class="mt-3 bg-rouge p-3">Rechercher un sujet</h4>

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
  <ul class="list-group list-group-flush">

    <div class="my-3" id="liste_blogs" ></div>

  </ul>


  <hr class="divider">



</div>
