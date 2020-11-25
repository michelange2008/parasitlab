<label for="personne">{{ $type }}</label>

<select class="form-control" name="personne" id="personne">

  <option value="tous" selected>Tous</option>

  @foreach ($personnes as $personne)

    <option value="{{ $personne->id }}">{{ $personne->name }}</option>

  @endforeach

</select>
