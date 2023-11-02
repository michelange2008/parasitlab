<div class="mt-2">

    @foreach ($menu as $item)
        @isset($item->onDashboard)
            @if ($item->onDashboard)
                <p class="lead bg-bleu text-white p-2">{{ $item->nom }}</p>
                @foreach ($item->sousmenu as $sousmenu)
                    @if ($sousmenu->id === 'divider')
                        <div class="dropdown-divider"></div>
                    @else
                        <p class="btn btn-light" title="@lang($sousmenu->prefixe . 'tooltip')">
                            <a href="{{ route($sousmenu->route) }}">
                                @lang($sousmenu->prefixe . 'nom')
                            </a>
                        </p>
                    @endif
                @endforeach
            @endif
        @endisset
    @endforeach

</div>
