<div class="form-group type_coll input_type" style="display:none">

  <label for="nomPrelevement_{{ $i }}">@lang('form.identif_prelev_coll', ['num' => $i])</label>

  @if ($i === 1)

    <input class="form-control" type="text" name="identification_{{$i}}" placeholder="intitulé" required>

  @else

    <input class="identification form-control" type="text" name="identification_{{$i}}" placeholder="intitulé">

  @endif


</div>

<div class="form-group type_indiv input_type" style="display:none">

  <label for="nomPrelevement_{{ $i }}">@lang('form.identif_prelev_indiv', ['num' => $i])</label>

  @if ($i === 1)

    <input class="form-control" type="text" name="identification_{{$i}}" placeholder="intitulé" required>

  @else

    <input class="identification form-control" type="text" name="identification_{{$i}}" placeholder="intitulé">

  @endif


</div>
