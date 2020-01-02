<div class="form-group">

  <label for="userSelect">Demandeur</label>

  <select class="form-control" id="userSelect" name="userDemande" required>

    <option required></option>

    <option id="nouveau" required>Nouveau</option>

    @foreach ($eleveurs as $eleveur)

      @if (session()->has('user') && $eleveur->user->id == session('user')->id)

        <option id="{{$eleveur->user->id}}" selected required>{{$eleveur->user->name}}</option>

      @else

        <option id="{{$eleveur->user->id}}" required>{{$eleveur->user->name}}</option>

      @endif


    @endforeach

  </select>

</div>
