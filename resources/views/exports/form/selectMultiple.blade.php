<label for="{{ $for }}">{{ $intitule }} <small>(maintenir le bouton Ctrl ou Maj pour une sélection multiple)</small></label>

<select multiple class="form-control" name="{{ $for }}[]" id="{{ $for }}" size={{ $datas->count() }}>

  {{-- <option value="all" disabled>Choisissez une ou plusieurs lignes</option> --}}

  @foreach ($datas as $data)

    <option value="{{ $data->id }}">{{ $data->nom }}</option>

  @endforeach

</select>
