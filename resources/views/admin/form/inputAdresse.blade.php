<label class="col-form-label" for="address_1">Adresse</label>

<div class="my-2 form-row">

  <div class="col-sm-6">

    @isset ($personne->address_1) {{-- Cas où c'est une modification --}}

      <input class="form-control" type="text" name="address_1" value="{{ $personne->address_1 ?? ''}}">

    @else {{-- Cas où c'est une création --}}

      <input class="form-control" type="text" name="address_1"  placeholder="adresse" required>

    @endisset

  </div>

  <div class="col-sm-6">

    @isset ($personne->address_2) {{-- Cas où c'est une modification --}}

      <input class="form-control" type="text" name="address_2" value="{{ $personne->address_2 ?? ''}}">

    @else {{-- Cas où c'est une création --}}

      <input class="form-control" type="text" name="address_2" placeholder="complément d'adresse">

    @endif


  </div>

</div>


<div class="my-2 form-row">

  <div class="col-sm-4">

    @isset ($personne->cp) {{-- Cas où c'est une modification --}}

      <input class="form-control" type="text" name="cp" value="{{ $personne->cp ?? '' }}">

    @else {{-- Cas où c'est une création --}}

      <input class="form-control" type="text" name="cp" placeholder="code postal" required>

    @endisset


  </div>

  <div class="col-sm-8">

    @isset ($personne->commune) {{-- Cas où c'est une modification --}}

      <input class="form-control" type="text" name="commune" value="{{ $personne->commune ?? '' }}">

    @else {{-- Cas où c'est une création --}}

      <input class="form-control" type="text" name="commune" placeholder="commune" required>

    @endisset


  </div>

</div>

  <select class="form-control" name="pays">

    @isset($personne->pays) {{-- Cas où c'est une modification --}}

      <option value="France" selected>{{ $personne->pays  ?? '' }}</option>

    @else {{-- Cas où c'est une création --}}

      <option value="France" selected>France</option>

    @endisset


    @foreach ($pays as $etat)

      <option value="{{ $etat  ?? '' }}">{{ $etat  ?? '' }}</option>

    @endforeach

  </select>
