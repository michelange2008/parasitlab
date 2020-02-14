<label class="col-form-label" for="veto">Vétérinaire</label>

<div class="my-2 form-row">

  <div class="input-group">

    <span class="input-group-text"><i class="material-icons">local_hospital</i></span>

    <select class="form-control" name="veto_id">


      @isset($user->eleveur->veto->id)

        <option value="{{$user->eleveur->veto->id}}" selected>{{ $user->eleveur->veto->user->name}}</option>

      @endisset

      <option value=null>Aucun vétérinaire</option>

      <option value="0">Nouveau vétérinaire</option>

      @foreach ($vetos as $veto)

        <option value="{{ $veto->id}}">{{ $veto->user->name }}</option>

      @endforeach

    </select>

  </div>

</div>
