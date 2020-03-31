  <label class="col-form-label" for="num">N° de cheptel</label>

  @isset($user)

    <input class="my-2 form-control" type="text" name="num" value="{{ $user->eleveur->num  ?? old('num') }}">

  @else

    <input class="my-2 form-control" type="text" name="num" placeholder="@lang('form.farm_id')">

  @endisset
