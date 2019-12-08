<label class="col-form-label" for="indicatif">Téléphone</label>

<div class="my-2 form-row">

  <div class="input-group col-sm-4">

    <span class="input-group-text"><i class="material-icons">language</i></span>

    <input class="form-control" type="text" name="indicatif" value="{{ $user->eleveur->indicatif ?? '' }}" placeholder="indicatif">

  </div>

  <div class="input-group col-sm-8">

    <span class="input-group-text" id="inputGroupPrepend"><i class="material-icons">phone</i></span>

    <input class="form-control" type="text" name="tel" value="{{ $user->eleveur->tel ?? '' }}" placeholder="numéro de téléphone">

  </div>

</div>
