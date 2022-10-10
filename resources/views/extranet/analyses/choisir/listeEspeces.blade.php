@foreach ($especes as $espece)

  <a id="espece_{{ $espece->abbreviation }}"  class="espece" name="{{ $espece->abbreviation }}" espece="{{ $espece->nom }}" href="#">

    <img id='img_{{ $espece->abbreviation }}' class="img-zoom" src="{!! url('storage/img/icones/'.$espece->icone->nom) !!}" alt="{{$espece->icone->nom}}" data-toggle="tooltip" title="{{ ucfirst($espece->nom) }}">

  </a>

@endforeach
