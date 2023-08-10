<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">

    @foreach ($menu as $item)
      @if(@isset($item->sousmenu))
        <li class="nav-item nav-item-bleu-tres-clair dropdown">
          <a id="{{ $item->id ?? '' }}" class="nav-link dropdown-toggle" href="{{ route($item->route) }}" id="navbarDropdown_{{ $item->id }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            @lang($item->prefixe."nom")
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown_{{ $item->id }}">
            @foreach ($item->sousmenu as $sousmenu)

              @if ($sousmenu->id === "divider")

                <div class="dropdown-divider"></div>

              @else

                <a class="dropdown-item d-inline-flex justify-content-between {{ $sousmenu->id }}" href="{{ route($sousmenu->route) }}">

                  @lang($sousmenu->prefixe."nom")

                </a>

              @endif

            @endforeach
          </div>
        </li>
      @else
        <li class="nav-item nav-item-bleu-tres-clair">
          <a id="{{ $item->id ?? '' }}" class="nav-link" href="{{ route($item->route) }}">
            @lang($item->prefixe."nom")
          </a>
        </li>
      @endif
    @endforeach
  </ul>
</div>

{{-- Boite de dialogue pour choisir l'espece et télécharger un formulaire--}}
@include('fragments.choixEspeces')
