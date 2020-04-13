<div class="form-group">

  <label for="nomPrelevement_{{ $i }}">@lang('form.identif_prelev', ['num' => $i])</label>

  @if ($i === 1)

    <input class="form-control" type="text" name="identification_{{$i}}" placeholder="intitulé" required>

  @else

    <input class="identification form-control" type="text" name="identification_{{$i}}" placeholder="intitulé">

  @endif


</div>
