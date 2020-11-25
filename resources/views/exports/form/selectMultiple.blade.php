<label for="{{ $for }}">{{ $intitule }} <small>(maintenir le bouton Ctrl pour une sélection multiple)</small></label>

<select multiple class="form-control" name="{{ $for }}[]" id="{{ $for }}" size={{ $datas->count() + 1 }}>

  <option value="tous" selected>Tous</option>

  @foreach ($datas as $data)

    <option value="{{ $data->id }}">{{ $data->nom }}</option>

  @endforeach

</select>
