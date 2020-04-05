<h4 id="titre_observations" style="display:none">@lang('choisir.liste_observations')</h4>


@foreach ($categories as $categorie)

  <ul id="liste_{{ $categorie->id }}" class="list_group liste_observations"></ul>
  

@endforeach
