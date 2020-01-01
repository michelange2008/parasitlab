{{-- <label class="col-sm-3 col-form-label" for="email">Adresse  mail</label> --}}

<div class="input-group">

  <span class="input-group-text" id="inputGroupPrepend">@</span>

  <input class="form-control" type="email" name="email" value="{{ $user->email ?? '' }}" placeholder="email" required>

</div>
