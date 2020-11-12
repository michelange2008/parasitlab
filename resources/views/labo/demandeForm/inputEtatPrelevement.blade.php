<div class="form-group">

  <label for="etatPrelevement_{{ $i }}">@lang('form.etat_prelev')</label>

  <select class="form-control" id="etatPrelevement_{{ $i }}" name="etatPrelevement_{{ $i }}">

    @foreach ($etats as $etat)

      <option value="{{ $etat->id }}">{{$etat->nom}}</option>

    @endforeach

  </select>

</div>
