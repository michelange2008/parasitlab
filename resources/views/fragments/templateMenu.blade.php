<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">

    @foreach ($menu as $item)
      @if(@isset($item->sousmenu))
      <li class="nav-item nav-item-bleu-tres-clair dropdown">
        <a class="nav-link dropdown-toggle" href="{{ route($item->route) }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ $item->nom }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @foreach ($item->sousmenu as $sousmenu)
              <a class="dropdown-item d-inline-flex justify-content-between" href="{{ route($sousmenu->route) }}">
                {!! $sousmenu->nom !!}
              </a>

          @endforeach
        </div>
      </li>
        @else
      <li class="nav-item nav-item-bleu-tres-clair ">
          <a class="nav-link" href="{{ route($item->route) }}">{!! $item->nom !!}</a>
      </li>
        @endif
    @endforeach

  </ul>
</div>
