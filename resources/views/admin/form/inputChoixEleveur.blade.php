<label for="eleveur">@lang('tableaux.proprietaire')</label>

<select id="eleveur" class="form-control">

    <option value="" disabled selected>@lang('form.choisir')</option>

  @foreach ($eleveurs as $eleveur)

    <option value="{{ $eleveur->id }}">{{ $eleveur->name }}</option>

  @endforeach
  
</select>
