<!-- SAISIE DES DATES DE PRELEVEMENT (NON REQUIS) OU DE RECEPTION (REQUIS) -->
<div class="form-group d-flex justify-content-between mt-2 mb-0">

  <label for="date_prelevement" class="my-0 mr-3">@lang('form.date_prelevement')</label>

  <div>

    <span id="prelevement_ok" class="text-success date_ok" style="display:none"><i class="fas fa-check"></i></span>

    <input id="prelevement" type="date" name="prelevement" value="" date="{{ $demande->date_prelevement ?? '' }}" >

  </div>

</div>
{{-- Phrase qui s'affichent si les dates sont dans le future ou plus de 10 jours avant aujourd'hui --}}
<div class="text-danger text-right mb-2">
  <small id="prelevement_futur" class="date_alerte" style="display:none">@lang('form.date_future')</small>
  <small id="prelevement_passe" class="date_alerte" style="display:none">@lang('form.date_passe')</small>
</div>


<div class="form-group d-flex justify-content-between">

  <label for="date_reception" class="my-0 mt-2 mb-0">@lang('form.date_reception')</label>

  <div>

    <span id="reception_ok" class="text-success date_ok" style="display:none"><i class="fas fa-check"></i></span>

    <input id="reception" type="date" name="reception" value="" date="{{ $demande->date_reception ?? '' }}" required>

  </div>

</div>
{{-- idem --}}
<div class="text-danger text-right mb-2">
  <small id="reception_futur" class="date_alerte" style="display:none">@lang('form.date_future')</small>
  <small id="reception_passe" class="date_alerte" style="display:none">@lang('form.date_passe')</small>
  <small id="reception_prelevement" class="date_alerte" style="display:none">@lang('form.reception_prelevement')</small>
</div>
