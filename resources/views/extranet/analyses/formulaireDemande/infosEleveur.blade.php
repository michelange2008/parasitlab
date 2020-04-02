<div class="form-group row">

  <div class="col-sm-8">

    <label class="col-form-label" for="veto">{{ ucfirst(__('form.vet')) }}</label>

    <div class="input-group my-2">

      <span class="input-group-text"><i class="fas fa-user-md"></i></span>

      <input type="text" class="form-control" name="veto" value="{{ $personne->veto->user->name ?? old('veto') }}" placeholder="{{ ucfirst(__('form.vet_nom')) }}">

    </div>

  </div>

  <div class="col-sm-4">

    @include('admin.form.inputEde')

  </div>


</div>
