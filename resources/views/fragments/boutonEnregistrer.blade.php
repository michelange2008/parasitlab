<button class="btn {{$couleur ?? 'btn-bleu'}} {{ $css ?? '' }} my-3 mr-1" type="submit">

  <i class="{{ $fa ?? 'fas fa-save' }}"></i>

  @lang($nomBouton ?? 'boutons.save')

</button>
