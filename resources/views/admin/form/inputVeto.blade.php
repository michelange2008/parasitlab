<label class="col-form-label" for="veto">{!! ucfirst(__('form.vet')) !!}</label>

<div class="my-2 form-row">

  <div class="input-group">

    <span class="input-group-text"><i class="fas fa-user-md"></i></span>

    <select class="form-control" name="veto_id">


      @isset($user->eleveur->veto->id)

        <option value="{{$user->eleveur->veto->id}}" selected>{{ $user->eleveur->veto->user->name}}</option>

      @endisset

      <option value=null>@lang('form.no_vet')</option>

      <option value="0">@lang('form.new_vet')</option>

      @foreach ($vetos as $veto)

        <option value="{{ $veto->id}}">{{ $veto->user->name }}</option>

      @endforeach

    </select>

  </div>

</div>
