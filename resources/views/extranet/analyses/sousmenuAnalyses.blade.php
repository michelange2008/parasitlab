<div class="col-md-2 bd-sidebar my-3 d-none d-md-block">

  <nav class="nav flex-column bg-bleu-tres-clair p-1">

    @foreach ($sousmenuAnalyses as $ligne)

      <p class="lead p-1 mt-3 color-bleu-tres-fonce">{{ $ligne->titre }}</p>

      @foreach ($ligne->contenu as $element)

        <li class="nav-item-sousmenu mb-2">

          @if ($element->type == 'route')

            <a href="{{ route($element->route) }}">
              <img class="img-50" src="{!! asset('storage/img/icones').'/'.$element->icone !!}" alt="{{ $element->intitule }}">
              {{ $element->intitule }}
            </a>

          @elseif ($element->type == 'mail')

            <img class="img-50" src="{!! asset('storage/img/icones/').'/'.$element->icone !!}" alt="{{ $element->intitule }}">
            {!! HTML::mailto($element->mail, $element->intitule) !!}

          @else

            <a href="{!! asset('storage').'/'.$element->file !!}">
              <img class="img-50" src="{!! asset('storage/img/icones').'/'.$element->icone !!}" alt="{{ $element->intitule }}">
              Formulaire
            </a>

          @endif

        </li>

      @endforeach

    @endforeach

  </nav>

</div>
