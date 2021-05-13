<form id="createListeAnimaux" action="{{ route('melange.store') }}" method="post">

  @csrf

  <div class="form-row">

    <div class="col-md-10 offset-md-1">

      <p class="font-weight-bold" colspan="3">@lang('form.add_animal')</p>

      <table class="table table-hover">

        <thead>

          <th>@lang('tableaux.num')</th>
          <th>@lang('tableaux.nom')</th>
          <th>@lang('tableaux.add_to_melange')</th>

        </thead>

        <tbody id="listeAnimals">
          @foreach ($animals as $animal)

            <tr>
              <td><label class='animal_numero' for="choix_{{ $animal->id }}">{{ $animal->numero }}</label></td>
              <td><label for="choix_{{ $animal->id }}">{{ $animal->nom }}</label></td>
              <td>
                <input id="choix_{{ $animal->id }}" type="checkbox" name="choix[]" value="{{ $animal->id }}">
              </td>
            </tr>

          @endforeach
        </tbody>

      </table>

    </div>

    <div class="form-group col-md-10 offset-md-1">

      <label for="nom_melange" class="font-weight-bold">@lang('form.nom_melange')</label>
      <input id="troupeau_id" type="hidden" name="troupeau_id" value="{{ $troupeau->id }}">
      <input id="nom_melange" class="form-control" type="text" name="nom_melange" required>


    </div>

    <div class="col-md-10 offset-md-1">

      @enregistreAnnule()

    </div>

  </div>

</form>
