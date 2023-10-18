
  <a href="{{ route($route, $id ?? '') }}" target="{{ $target ?? '_self' }}" class="mb-1 btn {{ $couleur ?? 'btn-bleu' }} ajuste_hauteur mx-1">

    <i class="{{ $fa ?? '' }}"></i> @lang('boutons.'.$intitule)

  </a>
