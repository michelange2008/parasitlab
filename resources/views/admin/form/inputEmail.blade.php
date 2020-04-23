{{-- <label class="col-sm-3 col-form-label" for="email">Adresse  mail</label> --}}

<div class="input-group my-2">

  <span class="input-group-text" id="prepend_email">@</span>

  <input id="champ_mail" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ $user->email ?? old('email') }}" placeholder="email" required>

</div>

  @error('email')
    <div class="invalid">Ce champs est obligatoire et doit contenir une adresse mail valide</div>
  @enderror
