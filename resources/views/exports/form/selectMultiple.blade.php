<label for="{{ $for }}">{{ ucfirst($intitule) }} <small>(@lang('form.selection_multiple'))</small></label>

<div class="form-check">

  <input id="all_{{ $for }}" class="all form-check-input" type="checkbox" name="all_{{ $for }}" value="">

  <label for="all_{{ $for }}">@lang('form.all'){{ $intitule }}</label>

</div>

<select multiple class="multiple form-control" name="{{ $for }}[]" id="{{ $for }}" size={{ $datas->count() }}>

  @foreach ($datas as $data)

    <option value="{{ $data->id }}">{{ $data->nom }}</option>

  @endforeach

</select>
