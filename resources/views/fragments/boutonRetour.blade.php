{{-- raccourci @retour() --}}
@isset($url)

  <a href="{{ $url }}" class="btn btn-secondary ajuste_hauteur mx-1"><i class="fas fa-undo-alt"></i> @lang('boutons.retour')</a>

@else

  <a href="{{ url()->previous()}}" class="btn btn-secondary ajuste_hauteur mx-1"><i class="fas fa-undo-alt"></i> @lang('boutons.retour')</a>

@endisset
