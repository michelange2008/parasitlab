<div class="col-md-2 bd-sidebar my-3 d-none d-md-block">

  <nav class="nav flex-column bg-bleu-tres-clair">

    @foreach ($sousmenuAnalyses as $ligne)

      <p class="lead py-1 pl-2 alert-bleu-tres-fonce text-truncate">{{ $ligne->titre }}</p>

      @foreach ($ligne->contenu as $element)

        <li class="nav-item-sousmenu pl-1 py-2 d-md-flex justify-content-md-center justify-content-lg-start">

          @if ($element->type == 'route')

            <a href="{{ route($element->route) }}" data-toggle="tooltip" title="{{ $element->intitule }}">
              <img class="img-40" src="{!! url('storage/img/icones/'.$element->icone) !!}">
              <span class="d-none d-lg-inline">{{ $element->intitule }}</span>
            </a>

          @elseif ($element->type == 'mail')

            <img class="img-40" src="{!! url('storage/img/icones/'.$element->icone) !!}" alt="{{ $element->intitule }}">
            {!! HTML::mailto($element->mail, $element->intitule, ['class' => 'd-none d-lg-inline']) !!}

          @else

            <a href="{!! asset('storage').'/'.$element->file !!}">
              <img class="img-40" src="{!! url('storage/img/icones/'.$element->icone) !!}" alt="{{ $element->intitule }}">
              <span class="d-none d-lg-inline">Formulaire</span>
            </a>

          @endif

        </li>

      @endforeach

    @endforeach

  </nav>

</div>
