<div class="form-group">

  <label for="especeSelect">Espèce</label>

  <select class="form-control" id="especeSelect" name="espece" required>

    @foreach ($especes as $espece)

      <option required>{{(mb_convert_case($espece->nom, MB_CASE_TITLE))}}</option>

    @endforeach

  </select>

</div>
