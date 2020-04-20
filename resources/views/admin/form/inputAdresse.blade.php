<label class="col-form-label" for="address_1">{!! ucfirst(__('form.address_1'))!!}</label>

<div class="my-2 form-row">

  <div class="col-sm-6">

    @isset ($personne->address_1) {{-- Cas où c'est une modification --}}

      <input id="address_1" class="form-control @error ('address_1') is-invalid @enderror" type="text" maxlength="190" name="address_1" value="{{ $personne->address_1 ?? old('address_1')}}">

    @else {{-- Cas où c'est une création --}}

      <input id="address_1" class="form-control @error ('address_1') is-invalid @enderror" type="text" maxlength="190" name="address_1"  placeholder="@lang('form.address_1')" value="{{ old('address_1') }}" required>

    @endisset

  </div>

  @error('address_1')
      <div class="invalid">@lang('form.champs_obligatoire_lettres_chiffres')/div>
  @enderror


  <div class="col-sm-6">

    @isset ($personne->address_2) {{-- Cas où c'est une modification --}}

      <input class="form-control @error ('address_2') is-invalid @enderror" type="text" maxlength="190" name="address_2" value="{{ $personne->address_2 ?? old('address_2')}}">

    @else {{-- Cas où c'est une création --}}

      <input class="form-control" type="text" maxlength="190" name="address_2" placeholder="@lang('form.address_2')" value="{{ old('address_2') }}">

    @endif

  </div>

  @error('address_2')
      <div class="invalid">@lang('form.champs_obligatoire_lettres_chiffres')</div>
  @enderror

</div>


<div class="my-2 form-row">

  <div class="col-sm-4">

    @isset ($personne->cp) {{-- Cas où c'est une modification --}}

      <input class="form-control @error ('cp') is-invalid  @enderror" type="text" name="cp" value="{{ $personne->cp ?? old('cp') }}">

    @else {{-- Cas où c'est une création --}}

      <input class="form-control @error ('cp') is-invalid  @enderror" type="text" name="cp" placeholder="@lang('form.cp')" required value="{{ old('cp') }}">

    @endisset

  </div>

  @error ('cp')
    <div class="invalid">@lang('form.champs_obligatoire_chiffres')</div>
  @enderror

  <div class="col-sm-8">

    @isset ($personne->commune) {{-- Cas où c'est une modification --}}

      <input class="form-control @error ('commune') is-invalid  @enderror" type="text" maxlength="190" name="commune" value="{{ $personne->commune ?? old('commune') }}">

    @else {{-- Cas où c'est une création --}}

      <input class="form-control @error ('commune') is-invalid  @enderror" type="text" maxlength="190" name="commune" placeholder="@lang('commune')" required value="{{ old('commune') }}">

    @endisset

  </div>

  @error ('commune')
    <div class="invalid">@lang('form.champs_obligatoire_lettres')</div>
  @enderror

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
