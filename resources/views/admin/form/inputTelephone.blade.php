<label class="col-form-label" for="indicatif">Téléphone</label>

<div class="my-2 form-row">

  <div class="input-group col-sm-4">

    <span class="input-group-text"><i class="material-icons">language</i></span>

    <input class="form-control @error ('indicatif') is-invalid  @enderror" type="text" name="indicatif" value="{{ $personne->indicatif ?? '33' }}" placeholder="indicatif">

  </div>

  @error ('indicatif')
    <div class="invalid">Ce champs ne doit comporter que des chiffres et pas plus de 3</div>
  @enderror

  <div class="input-group col-sm-8">

    <span class="input-group-text" id="inputGroupPrepend"><i class="material-icons">phone</i></span>

    <input class="form-control @error ('tel') is-invalid  @enderror" type="text" name="tel" value="{{ $personne->tel ?? old('tel') }}" placeholder="numéro de téléphone (10 chiffres si vous êtes en France)" required>

  </div>

  @error ('tel')
    <div class="invalid text-right">Ce champs ne doit comporter que des chiffres (10 au maximum)</div>
  @enderror

</div>
