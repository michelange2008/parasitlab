<!-- CHOIX DE L'ANALYSE -->

  <div class="form-group">

    <label for="anatypeSelect">@lang('form.ana_demandee')</label>

    <select id="select_anatype" class="form-control mb-3" name="anatype" required>

      @foreach ($anatypes as $anatype)
{{-- Il faut au moins un anatype sélectionner pour que nouvelle_demande.js puisse remplir le champs anaacte --}}
        <option {!! ($anatype->id == 1) ? 'selected' : ''!!} value={{ $anatype->id }} id="{{ $anatype->id }}" required>{{mb_convert_case($anatype->nom, MB_CASE_TITLE)}}</option>

      @endforeach

    </select>

      <label for="anaacte_id">@lang('form.type_acte')</label>
{{-- Emplacement libre pour que le nouvelle_demande.js puisse mettre la liste d'anaacte --}}
      <select id="select_anaacte" class="form-control" name="anaacte_id">

      </select>

    </div>
