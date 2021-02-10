{{-- <label class="col-sm-3 col-form-label" for="email">Adresse  mail</label> --}}

  <label class="col-form-label"  for="email">@lang('form.email')&nbsp;:</label>
  <div class="input-group">

  <input id="champ_mail" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ $user->email ?? old('email') }}" placeholder="email" required>

</div>

  @error('email')
    <div class="invalid">@lang('form.champs_obligatoire_email')</div>
  @enderror
{{-- ça c'est pour avoir la traduction pour les boites de dialogue jquery--}}
<div id="email_doublon" class="d-none" message="@lang('form.email_doublon')"></div>

<div id="email_non_valide" class="d-none" message="@lang('form.email_non_valide')"></div>
