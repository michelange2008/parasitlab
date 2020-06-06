<table class="table">

  <tbody>

    @foreach ($especes as $espece)

      @if (!$ages->contains('espece_id', $espece->id))

        <tr>

          <td> <img class="img-50" src="{{ url('storage/img/icones/'.$espece->icone->nom) }}" alt="{{$espece->nom}}"> </td>

          <td> <label for="{{ $espece->nom }}">{{ $espece->nom }}</label> </td>

          <td> <input id="{{ $espece->nom }}" class="form-check-input" type="checkbox" name="espece_{{ $espece->id }}" value=""
                  @if ($observation->especes->contains($espece))
                    checked
                  @endif
            ></td>

        </tr>
      @endif

    @endforeach

    @foreach ($ages as $age)

        <tr>

          <td> <img class="img-50" src="{{ url('storage/img/icones/'.$age->icone->nom) }}" alt="{{$age->nom}}"> </td>

          <td> <label for="{{ $age->nom }}">{{ $age->nom }}</label> </td>

          <td> <input id="{{ $age->nom }}" class="form-check-input" type="checkbox" name="age_{{ $age->id }}" value=""
                  @if ($observation->ages->contains($age))
                    checked
                  @endif
            ></td>

        </tr>

    @endforeach

</tbody>

</table>
