  <label class="col-form-label" for="fonction">Fonction:</label>

  @isset($user->labo->fonction)

    <input class="form-control" type="text" name="fonction" value="{{ $user->labo->fonction  ?? old('fonction') }}">

  @else

    <input class="form-control" type="text" name="fonction" placeholder="Fonction" value="{{ old('fonction') }}">

  @endisset
