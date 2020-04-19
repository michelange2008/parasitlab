<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">

    @foreach ($menu as $item)
      @if(@isset($item->sousmenu))
        <li class="nav-item nav-item-bleu-tres-clair dropdown">
          <a id="{{ $item->id ?? '' }}" class="nav-link dropdown-toggle" href="{{ route($item->route) }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            @lang($item->prefixe."nom")

          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($item->sousmenu as $sousmenu)

              <a class="dropdown-item d-inline-flex justify-content-between {{ $sousmenu->id }}" href="{{ route($sousmenu->route) }}">

                @lang($sousmenu->prefixe."nom")

              </a>

            @endforeach
          </div>
        </li>
      @else
        <li class="nav-item nav-item-bleu-tres-clair ">
          <a id="{{ $item->id ?? '' }}" class="nav-link" href="{{ route($item->route) }}">@lang($item->prefixe."nom")</a>
        </li>
      @endif
    @endforeach
  </ul>
</div>

{{-- Boite de dialogue pour choisir l'espece et télécharger un formulaire--}}
@include('fragments.choixEspeces')
