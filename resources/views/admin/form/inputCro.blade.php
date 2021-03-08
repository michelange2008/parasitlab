<label class="col-form-label" for="ede">@lang('form.vet_id')</label>

<div class="input-group col-md-6">

  @isset($user->veto->num)

    <input class="my-2 form-control" type="text" name="num" value="{{ $user->veto->num  ?? old('num') }}">

  @else

    <input class="my-2 form-control" type="text" name="num" placeholder="@lang('form.vet_id')">

  @endisset


</div>
