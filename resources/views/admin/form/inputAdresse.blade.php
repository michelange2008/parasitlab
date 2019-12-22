<label class="col-form-label" for="address_1">Adresse</label>

<div class="my-2 form-row">

  <div class="col-sm-6">

    @isset ($personne->address_1)

      <input class="form-control" type="text" name="address_1" value="{{ $personne->address_1 ?? ''}}">

    @else

      <input class="form-control" type="text" name="address_1"  placeholder="adresse">

    @endisset

  </div>

  <div class="col-sm-6">

    @isset ($personne->address_2)

      <input class="form-control" type="text" name="address_2" value="{{ $personne->address_2 ?? ''}}">

    @else

      <input class="form-control" type="text" name="address_2" placeholder="complément d'adresse">

    @endif


  </div>

</div>


<div class="my-2 form-row">

  <div class="col-sm-4">

    @isset ($personne->cp)

      <input class="form-control" type="text" name="cp" value="{{ $personne->cp ?? '' }}">

    @else

      <input class="form-control" type="text" name="cp" placeholder="code postal">

    @endisset


  </div>

  <div class="col-sm-8">

    @isset ($personne->commune)

      <input class="form-control" type="text" name="commune" value="{{ $personne->commune ?? '' }}">

    @else

      <input class="form-control" type="text" name="commune" placeholder="commune">

    @endisset


  </div>

</div>

  <select class="form-control" name="pays">
    @isset($personne->pays)

      <option value="France" selected>{{ $personne->pays  ?? '' }}</option>

    @else

      <option value="France" selected>France</option>

    @endisset


    @foreach ($pays as $etat)

      <option value="{{ $etat  ?? '' }}">{{ $etat  ?? '' }}</option>

    @endforeach

  </select>
