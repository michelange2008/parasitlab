@if (isset($type) && $type == 'mail')

  @include('fragments.boutonMailTo')

@elseif (isset($type) && $type == 'link')

  <a class="btn {{$couleur ?? 'btn-bleu'}}" href="{{ $lien }}" target="_blank" >

    <i class="{{ $fa }}"></i>

    {{ $intitule }}

  </a>

@elseif (isset($type) && $type == 'route')

  <a class="btn {{$couleur ?? 'btn-bleu'}}" href="{{ route( $route ) }}" target="_blank" >

    <i class="{{ $fa }}"></i>

    {{ $intitule }}

  </a>

@elseif (isset($type) && $type == 'phone')

  <div class="btn {{$couleur ?? 'btn-bleu'}}">

    <i class="fas fa-phone"></i>

    {{ $intitule }}

  </div>

@else



@endif
