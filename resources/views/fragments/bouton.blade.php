@if (isset($type) && $type == 'mail') {{-- mailto --}}

  @include('fragments.boutonMailTo')


@elseif (isset($type) && $type == 'link') {{-- lien externe --}}

  <a class="btn {{$couleur ?? 'btn-bleu'}}" href="{{ $lien }}" target="{{$target ?? '_blank'}}" >

    <i class="{{ $fa ?? '' }}"></i>

    {{ $intitule }}

  </a>

@elseif (isset($type) && $type == 'route') {{-- lien interne --}}

  <a class="btn {{$couleur ?? 'btn-bleu'}}" href="{{ route( $route ) }}">

    <i class="{{ $fa ?? '' }}"></i>

    {{ $intitule }}

  </a>

@elseif (isset($type) && $type == 'phone') {{-- faux bouton --}}

  <div class="btn {{$couleur ?? 'btn-bleu'}}">

    <i class="{{ $fa ?? ''}}"></i>

    {{ $intitule }}

  </div>

@else



@endif
