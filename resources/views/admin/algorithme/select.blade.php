<select class="form-control" name="{{ $name }}">

  <option value="" selected>@lang('form.'.$texte)</option>

  @foreach ($items as $item)

    <option value="{{ $item->id }}">{{ $item->nom }}</option>

  @endforeach

</select>
