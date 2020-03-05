<form action="factures.store" method="post">

    <h3>{{ $user->name }}</h3>

    <div class="form-group">

      <div class="col">

        <input class="form-control" type="hidden" name="destinataire" value="{{ $user->id }}">

      </div>

    </div>

    <div class="form-group">

      <label for="userSelect">Analyses à facturer</label>

      <select multiple class="form-control" id="userSelect" name="userDemande" required>

        @foreach ($demandes as $demande)

            <option id="{{$demande->id}}" selected required>{{$demande->anapack->nom." (".$demande->date_reception.")"}}</option>


        @endforeach

      </select>

    </div>

</form>
