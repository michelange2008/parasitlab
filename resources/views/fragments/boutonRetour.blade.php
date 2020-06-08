{{-- raccourci @retour() --}}
@isset($route)

  <a href="{{ route($route) }}" class="btn btn-secondary ajuste_hauteur mx-1"><i class="{{ $fa ?? 'fas fa-undo-alt'}}"></i> {{ __('boutons.'.($intitule ?? 'retour')) }}</a>

@else

  <a href="{{ url()->previous()}}" class="btn btn-secondary ajuste_hauteur mx-1"><i class="{{ $fa ?? 'fas fa-undo-alt'}}"></i> {{ __('boutons.'.($intitule ?? 'retour')) }}</a>

@endisset
