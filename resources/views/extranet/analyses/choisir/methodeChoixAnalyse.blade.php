<h4 id="titre_observations" style="display:none">@lang('choisir.liste_observations')</h4>

@foreach ($categories as $categorie)

    <div class="accordion mb-3" id="accordion_{{ $categorie->id }}">

    {{-- <div class="card">

      <div class="card-header" id="observation_ID">
        <h2 class="mb-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_ID" aria-expanded="false" aria-controls="texte_ID" >
            Titre
          </button>
        </h2>
      </div>

      <div id="texte_ID" class="collapse" aria-labelledby="observation_ID" data-parent="accordion_{{ $categorie->id }}">
        <div class="card-body">
          Explications + Autres
        </div>
      </div>

    </div> --}}
    {{-- <ul id="liste_{{ $categorie->id }}" class="list_group liste_observations"></ul> --}}
  </div>

@endforeach
