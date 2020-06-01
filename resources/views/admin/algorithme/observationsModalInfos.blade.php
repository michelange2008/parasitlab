<div id="modal-infos" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modal-infos" aria-hidden="true">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header d-flex justify-content-start align-items-center">
        Modifier l'observation
      </div>

      <div class="modal-body">
        <form id="" class="observation_update" action="{{ route('observations.update', 1) }}">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label for="intitule">Intitulé</label>
            <div id="intitule-modal"></div>
          </div>
          <div class="form-group">
            <label for="explication">Explication</label>
            <div id="explication-modal"></div>
          </div>
          <div class="form-group">
            <label for="autres">Autres causes possibles</label>
            <div id="autres-modal"></div>
          </div>
          <div class="form-group">
            <label>Catégories</label>
            <div class=" border px-3 py-2">
              @foreach ($categories as $categorie)
                <div class="custom-control custom-radio ">
                  <input id="{{ $categorie->nom }}" class="custom-control-input" type="radio" name="categorie" value="{{ $categorie->id }}">
                  <label class="custom-control-label" for="{{ $categorie->nom }}">{{ $categorie->nom }}</label>
                </div>
              @endforeach
            </div>
          </div>
          <div class="form-group">
            <label for="ordre">Position dans la liste</label>
            <div id="ordre-modal"></div>
          </div>
          <div class="my-3">
            @enregistreAnnule()
          </div>


        </form>
      </div>

    </div>

  </div>

</div>
