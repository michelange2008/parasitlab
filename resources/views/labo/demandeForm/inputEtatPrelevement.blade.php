<div class="form-inline">

  <label for="etatPrelevement_{{ $i }}">@lang('form.etat_prelev')</label>

  <select class="form-control mx-3" id="etatPrelevement_{{ $i }}" name="etatPrelevement_{{ $i }}">

    @foreach ($etats as $etat)
      {{-- Si on est dans le cadre de la modification d'un prélèvement, on met en selected l'état du prélèvement --}}
      @if(isset($prelevement))

        @if ($prelevement->etat_id == $etat->id)

          <option value="{{ $etat->id }}" selected>{{$etat->nom}}</option>

        @else

          <option value="{{ $etat->id }}">{{$etat->nom}}</option>

        @endif

      @else

        <option value="{{ $etat->id }}">{{$etat->nom}}</option>

      @endif

    @endforeach

  </select>

</div>
