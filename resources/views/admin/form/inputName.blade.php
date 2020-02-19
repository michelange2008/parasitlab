  <label class="col-form-label" for="name">Nom:</label>

  <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $user->name  ?? old('name') }}" required>

    @error('name')
        <div class="invalid">Ce champs est obligatoire et ne doit contenir que des lettres et de chiffres</div>
    @enderror
