@foreach ($especes as $espece)

  <a id="espece_{{ $espece->id }}" class="espece" name="{{ $espece->nom }}" href="#">

    <img class="img-zoom" src="{!! asset('storage/img/icones').'/'.$espece->icone->nom !!}" alt="{{$espece->icone->nom}}" data-toggle="tooltip" title="{{ ucfirst($espece->nom) }}">

  </a>

@endforeach
