  <label class="col-form-label" for="ede">N° de cheptel</label>

  @isset($user)

    <input class="my-2 form-control" type="text" name="num" value="{{ $user->eleveur->num  ?? '' }}">

  @else

    <input class="my-2 form-control" type="text" name="num" placeholder="numéro de cheptel">

  @endisset
