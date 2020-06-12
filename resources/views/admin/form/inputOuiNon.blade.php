<p>@lang('form.'.$intitule)</p>

<div class="custom-control custom-radio custom-control-inline">

  <input type="radio" id="oui" name="{{ $name ?? 'nom' }}" class="custom-control-input" value=1 checked>

  <label class="custom-control-label" for="oui">@lang('form.oui')</label>

</div>

<div class="custom-control custom-radio custom-control-inline">

  <input type="radio" id="non" name="{{ $name ?? 'nom' }}" class="custom-control-input" value=0>

  <label class="custom-control-label" for="non">@lang('form.non')</label>

</div>
