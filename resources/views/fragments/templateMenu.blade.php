<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">

    @foreach ($menu as $item)
      @if(@isset($item->sousmenu))
        <li class="nav-item nav-item-bleu-tres-clair dropdown">
          <a id="{{ $item->id ?? '' }}" class="nav-link dropdown-toggle" href="{{ route($item->route) }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ $item->nom }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($item->sousmenu as $sousmenu)

              <a class="dropdown-item d-inline-flex justify-content-between {{ $sousmenu->id }}" href="{{ route($sousmenu->route) }}">
                {!! $sousmenu->nom !!}
              </a>

            @endforeach
          </div>
        </li>
      @else
        <li class="nav-item nav-item-bleu-tres-clair ">
          <a id="{{ $item->id ?? '' }}" class="nav-link" href="{{ route($item->route) }}">{!! $item->nom !!}</a>
        </li>
      @endif
    @endforeach
  </ul>
</div>

{{-- Boite de dialogue pour choisir l'espece et télécharger un formulaire--}}
<div id="choix" class="choix_especes" style="display:none;position:fixed; top:20vh; left:25%;width:50%; box-shadow: 4px 4px 17px black">
  {{-- stockage de l'adresse générique des formulaires pdf --}}
  <div id="pdf_generique" class="d-none">{{ url('storage/') }}</div>
  {{-- <form id="choix_form" action="{{ route('analyses.formulairePdf') }}" method="post"> --}}
    <div class="card">

      <div class="card-header">

        <h3>

          <img class="mr-3 mt-1" src="{{ url('storage/img/icones/especes.svg') }}" alt="">

          @lang('menus.teleForm')

        </h3>

        <h5 class="text-center">@lang('menus.clicEspece')</h5>

      </div>

      <div id="card-especes" class="card-body d-flex justify-content-around">
        {{-- ZONE POUR INSERER LES ICONES DES ESPECES --}}
      </div>

      <div class="card-footer">

        <button id="choix_annule" class="btn btn-secondary" type="button" name="button">@lang('boutons.annule')</button>

      </div>

    {{-- </form> --}}

  </div>

</div>
