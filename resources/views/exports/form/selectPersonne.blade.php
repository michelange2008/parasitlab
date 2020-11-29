<label for="{{ $name }}">{{ $type }}</label>

<select class="form-control" name="{{ $name }}" id="personne">

  <option value="%" selected>Tous</option>

  @foreach ($personnes as $personne)

    <option value="{{ $personne->id }}">{{ $personne->name }}</option>

  @endforeach

</select>
