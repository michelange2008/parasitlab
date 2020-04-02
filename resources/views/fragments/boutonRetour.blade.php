@isset($url)

  <a href="{{ $url }}" class="btn btn-secondary ajuste_hauteur mx-1">@lang('commun.retour')</a>

@else

  <a href="{{ url()->previous()}}" class="btn btn-secondary ajuste_hauteur mx-1">@lang('commun.retour')</a>

@endisset
