<!-- CHOIX DE L'ANALYSE -->

  <div class="form-group">

    <label for="anapackSelect">Pack d'analyses</label>

    <select class="form-control" id="anapackSelect" name="anapack" required>

      @foreach ($anapacks as $anapack)

        <option id="{{ $anapack->id }}" required>{{mb_convert_case($anapack->nom, MB_CASE_TITLE)}}</option>

      @endforeach

    </select>

  </div>
