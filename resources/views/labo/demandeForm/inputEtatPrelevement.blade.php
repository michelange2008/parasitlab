<div class="form-group">

  <label for="etatPrelevement_{{ $i }}">Etat du prélèvement</label>

  <select class="form-control" id="etatPrelevement_{{ $i }}" name="etatPrelevement_{{ $i }}">

    @foreach ($etats as $etat)

      <option>{{$etat->nom}}</option>

    @endforeach

  </select>

</div>
