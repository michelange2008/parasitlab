<label class="col-form-label" for="address_1">Adresse</label>

<div class="my-2 form-row">

  <div class="col-sm-6">

    <input class="form-control" type="text" name="address_1" value="{{ $user->eleveur->address_1 ?? ''}}"  placeholder="adresse">

  </div>

  <div class="col-sm-6">

    <input class="form-control" type="text" name="address_2" value="{{ $user->eleveur->address_2 ?? ''}}" placeholder="complément d'adresse">

  </div>

</div>


<div class="my-2 form-row">

  <div class="col-sm-4">

    <input class="form-control" type="text" name="cp" value="{{ $user->eleveur->cp ?? '' }}" placeholder="code postal">

  </div>

  <div class="col-sm-8">

    <input class="form-control" type="text" name="commune" value="{{ $user->eleveur->commune ?? '' }}" placeholder="commune">

  </div>

</div>

  <select class="form-control" name="pays">

    <option value="France" selected>{{ $user->eleveur->pays  ?? '' }}</option>

    @foreach ($pays as $etat)

      <option value="{{ $etat  ?? '' }}">{{ $etat  ?? '' }}</option>

    @endforeach

  </select>
