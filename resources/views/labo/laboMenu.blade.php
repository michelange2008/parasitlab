<nav class="navbar navbar-expand-lg navbar-dark bg-bleu-tres-fonce sticky-top">
  <a class="navbar-brand" href="#">
    <img src="{{ asset('storage/logo-clair.svg') }}" alt="Parasit'Lab" height="30">
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      @foreach ($menu as $item)
        @if(@isset($item->sousmenu))
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="{{ route($item->route) }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ $item->nom }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($item->sousmenu as $sousmenu)
              <a class="dropdown-item" href="{{ route($sousmenu->route) }}">{{ $sousmenu->nom }}</a>
            @endforeach
          </div>
        </li>
          @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route($item->route) }}">{{ $item->nom }}</a>
        </li>
          @endif
      @endforeach

    </ul>
  </div>
  <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
      </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
  </li>

  </ul>
</nav>
