<div class="form-group">

  <label for="especeSelect">@lang('form.espece')</label>

  <select class="form-control" id="especeSelect" name="espece" required>

    @foreach ($especes as $espece)

      <option id="{{ $espece->nom }}" required>{{(mb_convert_case($espece->nom, MB_CASE_TITLE))}}</option>

    @endforeach

  </select>

</div>
