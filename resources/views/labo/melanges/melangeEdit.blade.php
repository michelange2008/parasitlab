@extends('labo.melanges.melangeCreateEdit')

@section('titre')

  @titre(['titre' => $melange->nom, 'icone' => 'mela_add.svg'])

@endsection

@section('animaux')

  <form action="{{ route('melange.update', $melange->id) }}" method="post">

    @csrf
    @method('put')

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

                  @if ($melange->animals->contains($animal->id))

                    <input id="choix_{{ $animal->id }}" type="checkbox" name="choix[]" value="{{ $animal->id }}" checked>

                  @else

                    <input id="choix_{{ $animal->id }}" type="checkbox" name="choix[]" value="{{ $animal->id }}">

                  @endif
                </td>
              </tr>

            @endforeach
          </tbody>

        </table>

      </div>

      <div class="col-md-10 offset-md-1">

        @enregistreAnnule()

      </div>

    </div>

  </form>

@endsection
