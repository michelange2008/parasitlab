<nav class="navbar navbar-expand-lg navbar-bleu-tres-clair sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{url('storage/logo.svg')}}" alt="Parasit'Lab" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Left Side Of Navbar -->

        @include('fragments.templateMenu')


        {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              {{-- AFFICHAGE D'UN LIEN DIFFERENT SI L'UTILISATEUR CONNECTE EST UN LABO, ELEVEUR OU VETO --}}
              @if (isset(Auth::user()->usertype) )

                <li class="nav-item nav-item-bleu-tres-clair">

                  <a class="nav-link" href="{{ route(Auth::user()->usertype->route)}}" title="@lang('menuExtranet.cliquer_acces_perso')"><strong>@lang('menuExtranet.acces_personnel')</strong></a>

                </li>

              @endif
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item nav-item-bleu-tres-clair">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item nav-item-bleu-tres-clair dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        {{-- </div> --}}
    </div>
</nav>
