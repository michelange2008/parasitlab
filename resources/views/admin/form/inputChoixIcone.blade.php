<div class="form-row my-3">

  <div class="col d-flex justify-content-around">

    <img class="img-40" src="{{ url('storage/img/icones/'.($icone->nom ?? '')) }}" alt="">

    <button type='button' id='choix_icone' class="btn btn-outline-secondary d-inline" data-toggle="modal" data-target=".liste_icones">Choisir une icone</button>

  </div>

  <div class="col">
    {{-- champ visible mais désactivé pour afficher le nom de l'icone --}}
    <input id="input_choix_icone_nom" class="form-control" type="text" name="icone_nom" value="{{ $icone->nom ?? '' }}" disabled>
    {{-- Champs activé mais invisible pour transmettre l'id de l'icone --}}
    <input id="input_choix_icone_id" class="form-control" type="hidden" name="icone_id" value="{{ $icone->id ?? '' }}">

  </div>

</div>

<div id="modal-choix-icone" class="modal fade liste_icones" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-xl">

    <div class="modal-content">

      <div class="p-3">

        @foreach ($icones as $icone)

          <img id="{{ $icone->id }}" class="img-100px my-3 icone icone_add" src="{{ url('storage/img/icones/'.$icone->nom) }}" alt="{{ $icone->nom }}" data-toggle="tooltip" title="{{ $icone->nom }}">

        @endforeach

      </div>

    </div>

  </div>

</div>
