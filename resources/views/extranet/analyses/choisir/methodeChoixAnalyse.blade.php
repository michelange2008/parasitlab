<h4 id="titre_observations" class="mb-3" style="display:none">@lang('choisir.liste_observations')</h4>

@foreach ($categories as $categorie)

    <div class="liste_observations mb-3" id="observations_{{ $categorie->id }}"></div>

@endforeach
