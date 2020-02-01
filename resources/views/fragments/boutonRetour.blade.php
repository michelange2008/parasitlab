@isset($url)

  <a href="{{ $url }}" class="btn btn-secondary ajuste_hauteur mx-1">Retour</a>

@else

  <a href="{{ url()->previous()}}" class="btn btn-secondary ajuste_hauteur mx-1">Retour</a>

@endisset
