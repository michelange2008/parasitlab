<!-- CHOIX DE L'ANALYSE -->
<div class="form-group">

  <label for="anatypeSelect">@lang('form.ana_demandee')</label>

  <select id="anatypeSelect" class="form-control mb-3" name="anatype" required>

    <option value="" disabled selected>Choisir un type d'analyse ...</option>

    @foreach ($anatypes as $anatype)
          {{-- Il faut au moins un anatype sélectionner pour que nouvelle_demande.js puisse remplir le champs anaacte --}}
      <option value={{ $anatype->id }} id="anatypes_{{ $anatype->id }}" class="liste_anatypes" required>{{mb_convert_case($anatype->nom, MB_CASE_TITLE)}}</option>

    @endforeach

  </select>

  <small id="typeAlerte" class="text-danger text-right" style="display:none">@lang('form.erreur_type')</small>

</div>
