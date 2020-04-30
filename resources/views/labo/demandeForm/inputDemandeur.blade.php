<div class="form-group">

  <label for="userSelect">@lang('form.demandeur')</label>

  <select class="form-control" id="userSelect" name="userDemande" required>

    <option required></option>

    <option id="nouveau" required titre = "@lang('form.new_farmer')" texte="@lang('form.create_new_eleveur')">@lang('form.new')</option>

    @foreach ($eleveurs as $eleveur)

      @if (session()->has('user') && $eleveur->user->id == session('user')->id)

        <option id="{{$eleveur->user_id}}" selected required>{{$eleveur->name}}</option>

      @else

        <option id="{{$eleveur->user_id}}" required>{{$eleveur->name}}</option>

      @endif


    @endforeach

  </select>

</div>
