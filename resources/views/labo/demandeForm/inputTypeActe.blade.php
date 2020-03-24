<!-- CHOIX DE L'ANALYSE -->

  <div class="form-group">

    <label for="anatypeSelect">Type d'analyses</label>

    <select id="select_anatype" class="form-control mb-3" name="anatype" required>

      @foreach ($anatypes as $anatype)
{{-- Il faut au moins un anatype sélectionner pour que choisir.js puisse remplir le champs anaacte --}}
        <option {!! ($anatype->id == 1) ? 'selected' : ''!!} value={{ $anatype->id }} id="{{ $anatype->id }}" required>{{mb_convert_case($anatype->nom, MB_CASE_TITLE)}}</option>

      @endforeach

    </select>

      <label for="anaacte_id">Type d'acte</label>
{{-- Emplacement libre pour que le choisir.js puisse mettre la liste d'anaacte --}}
      <select id="select_anaacte" class="form-control" name="anaacte_id">

      </select>

    </div>
