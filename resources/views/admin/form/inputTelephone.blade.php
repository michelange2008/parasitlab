<label class="col-form-label" for="indicatif">Téléphone</label>

<div class="my-2 form-row">

  <div class="input-group col-sm-4">

    <span class="input-group-text"><i class="fas fa-globe-europe"></i></span>

    <input class="form-control @error ('indicatif') is-invalid  @enderror" type="text" maxlength="3" name="indicatif" value="{{ $personne->indicatif ?? '33' }}" placeholder="@lang('indicatif')">

  </div>

  @error ('indicatif')
    <div class="invalid">@lang('form.champs_chiffres_max_3')</div>
  @enderror

  <div class="input-group col-sm-8">

    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone-alt"></i></span>

    <input class="form-control @error ('tel') is-invalid  @enderror" type="text" maxlength="10" name="tel" value="{{ $personne->tel ?? old('tel') }}" placeholder="@lang('form.placeholder_tel')" required>

  </div>

  @error ('tel')
    <div class="invalid text-right">@lang('form.champs_chiffres_max_10')</div>
  @enderror

</div>
