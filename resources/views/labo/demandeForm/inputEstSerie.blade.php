<div class="border-left border-danger pl-3">

  <p class="text-danger">

    <i class="fas fa-exclamation-triangle"></i>

    <strong>@lang('form.estSerie')</strong>

    <span class="text-secondary">&nbsp;:&nbsp;@lang('form.serie_explic')</span>

  </p>

  <div id="pas_de_serie">

    <p>Cet utilisateur n'a pas d'autres séries en cours, donc il s'agit du premier prélèvemen d'une nouvelle série</p>

    <input type="radio" class="d-none"  id="premierPrelevementSerie" name="serie" value='null' checked >

  </div>

  <div id="y_a_serie" style="display:none">

    <p>@lang('form.faire_choix')</p>

    <div id="premier" class="form-check"></div>

    {{-- Ci-dessous div non visible uniquemenent destiné à fournir le texte traduit à createDemande.js --}}
    <div id="autre" class="d-none" texte="@lang('form.nouvel_envoi')"></div>
    <div id="premier_envoi" class="d-none" texte="@lang('form.premier_envoi')"></div>

  </div>

</div>
