<div class="form-group">

  <label for="consistancePrelevement_{{ $i }}">Consistance du prélèvement</label>

  <select class="form-control" id="consistancePrelevement_{{ $i }}" name="consistancePrelevement_{{ $i }}">

    @foreach ($consistances as $consistance)

      <option>{{$consistance->nom}}</option>

    @endforeach

  </select>

</div>
