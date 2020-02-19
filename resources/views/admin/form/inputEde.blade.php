  <label class="col-form-label" for="num">N° de cheptel</label>

  @isset($user)

    <input class="my-2 form-control @error ('ede') is-invalid  @enderror" type="text" name="num" value="{{ $user->eleveur->num  ?? old('num') }}" required>

  @else

    <input class="my-2 form-control @error ('ede') is-invalid  @enderror" type="text" name="num" placeholder="numéro de cheptel" required>

  @endisset

@error ('ede')
  <div class="invalid">Ce champs est obligatoire</div>
@enderror
