@isset($couleur)
  <a href="{{ route($route, $id) }}" class="btn {{ $couleur }} rounded-0 ajuste_hauteur mx-1">{{ $intitule }}</a>
@else
  <a href="{{ route($route, $id) }}" class="btn btn-bleu ajuste_hauteur mx-1">{{ $intitule }}</a>
@endisset
