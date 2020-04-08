<h4 id="titre_observations" class="mb-3" style="display:none">@lang('choisir.liste_observations')</h4>

@foreach ($categories as $categorie)

  <div class="categorie lead alert-bleu p-2" style="display:none">
    {{ $categorie->nom }}
  </div>
  <div class="mb-3 liste_observations" id="categorie_{{ $categorie->id }}"></div>

@endforeach
