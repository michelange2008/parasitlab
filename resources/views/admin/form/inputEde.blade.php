  <label class="col-form-label" for="num">{{ ucfirst(__('form.farm_id'))}}</label>

  @isset($user)

    <input class="my-2 form-control" type="text" name="num" value="{{ $user->eleveur->num  ?? old('num') }}">

  @else

    <input class="my-2 form-control" type="text" name="num" placeholder="@lang('form.farm_id')">

  @endisset
