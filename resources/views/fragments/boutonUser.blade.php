@isset($couleur)
  <a href="{{ route($route, $id) }}" class="btn {{ $couleur }} rounded-0">{{ $intitule }}</a>
@else
  <a href="{{ route($route, $id) }}" class="btn btn-bleu">{{ $intitule }}</a>
@endisset
