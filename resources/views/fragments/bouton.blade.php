@if (isset($type) && $type == 'mail') {{-- mailto --}}

  <button class="btn btn-bleu" type="button" name="button">

    <i class="fas fa-paper-plane"></i>

    <a href="mailto:contact@parasitlab.org?subject={!! $sujet ?? '' !!}&body={!! $contenu ?? '' !!}">{{$intitule}}</a>

  </button>

@elseif (isset($type) && $type == 'link') {{-- lien externe --}}

  <a class="btn {{$couleur ?? 'btn-bleu'}} {{ $taille ?? "" }}" href="{{ url($lien) }}" target="{{$target ?? '_blank'}}" >

    <i class="{{ $fa ?? '' }}"></i>

    @lang($intitule)

  </a>

@elseif (isset($type) && $type == 'route') {{-- lien interne --}}

  <a id="{{ $bouton_id ?? 'idLien'}}" class="btn {{$couleur ?? 'btn-bleu'}} {{ $taille ?? "" }}" href="{{ route( $route, $id ?? '' ) }}">

    <i class="{{ $fa ?? '' }}"></i>

    @lang($intitule)

  </a>

@elseif (isset($type) && $type == 'phone') {{-- faux bouton --}}

  <div class="btn {{$couleur ?? 'btn-bleu'}} {{ $taille ?? "" }}">

    <i class="{{ $fa ?? ''}}"></i>

    @lang($intitule)

    &nbsp;&nbsp;&nbsp;<i class="{{ $fa2 ?? '' }}"></i>

  </div>

@else



@endif
