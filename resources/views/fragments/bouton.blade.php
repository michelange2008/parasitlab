@if (isset($type) && $type == 'mail') {{-- mailto --}}

  @include('fragments.boutonMailTo')


@elseif (isset($type) && $type == 'link') {{-- lien externe --}}

  <a class="btn {{$couleur ?? 'btn-bleu'}} {{ $taille ?? "" }}" href="{{ url($lien) }}" target="{{$target ?? '_blank'}}" >

    <i class="{{ $fa ?? '' }}"></i>

    {{ $intitule }}

    &nbsp&nbsp&nbsp<i class="{{ $fa2 ?? '' }}"></i>

  </a>

@elseif (isset($type) && $type == 'route') {{-- lien interne --}}

  <a id="{{ $bouton_id ?? ''}}" class="btn {{$couleur ?? 'btn-bleu'}} {{ $taille ?? "" }}" href="{{ route( $route, $id ?? '' ) }}">

    <i class="{{ $fa ?? '' }}"></i>

    {{ __( $intitule ) }}

    &nbsp&nbsp&nbsp<i class="{{ $fa2 ?? '' }}"></i>


  </a>

@elseif (isset($type) && $type == 'phone') {{-- faux bouton --}}

  <div class="btn {{$couleur ?? 'btn-bleu'}} {{ $taille ?? "" }}">

    <i class="{{ $fa ?? ''}}"></i>

    {{ $intitule }}

    &nbsp&nbsp&nbsp<i class="{{ $fa2 ?? '' }}"></i>

  </div>

@else



@endif
