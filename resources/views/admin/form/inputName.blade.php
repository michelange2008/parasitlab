  <label class="col-form-label" for="name">@lang('form.nom')&nbsp;:</label>

  <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" maxlength="190" name="name" value="{{ $user->name  ?? old('name') }}" required>

    @error('name')
        <div class="invalid">@lang('form.champs_obligatoire_lettres_chiffres')</div>
    @enderror
