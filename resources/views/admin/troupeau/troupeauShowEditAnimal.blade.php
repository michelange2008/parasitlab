@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-11">

        @include('fragments.flash')

      </div>

    </div>

    <div class="row justify-content-center my-3">

      <div class="col-lg-8">

        @titre(['titre' => $troupeau->nom, 'icone' => $troupeau->typeprod->espece->icone->nom, 'soustitre' => "(".$troupeau->user->name.")"])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-lg-8">

        <table class="table">

          <thead>

            <tr class="alert-bleu-tres-fonce">

              <td>@lang('tableaux.num')</td>
              <td>@lang('tableaux.nom')</td>
              <td>@lang('form.addmodif')</td>
              <td>@lang('tableaux.suppr')</td>

            </tr>

          </thead>

          <tbody>

            <tr>
              <form id="add_animal" class="" action="{{ route('animal.store') }}" method="post">

                @csrf

                <input type="hidden" name="troupeau_id" value="{{ $troupeau->id }}">

                <td><input id="add_animal_numero" class="form-control" type="text" name="numero" aria-described="animal_numero_doublon" placeholder="Numéro du nouvel animal">
                  <div id="animal_numero_doublon" class="invalid-feedback">
                    @lang('form.animal_exist')
                  </div>
                </td>

                <td><input id="add_animal_nom" class="form-control" type="text" name="nom" placeholder="Nom"></td>

                <td class="text-center">

                  <button id="add_animal_btn" class="btn btn_animal_create" type="submit"><i class="fas fa-plus-circle text-success"></i></button>

                </td>

              </form>

            </tr>

            @foreach ($troupeau->animals as $animal)

              <form id="animal_edit_.{{ $animal->id }}" class="" action="{{ route('animal.update', $animal->id) }}" method="post">

                @csrf
                @method('patch')

                <tr>

                  <td>
                    <input id="animal_numero_{{ $animal->numero }}" class="animal_existant animal_numero form-control-plaintext"
                        aria-described="animal_numero_doublon_{{ $animal->numero }}"
                        type="text" name="numero" value="{{ $animal->numero }}" required>

                    <div id="animal_numero_doublon_{{ $animal->id }}" class="invalid-feedback">

                      @lang('form.animal_exist')

                    </div>

                  </td>

                  <td><input id="animal_nom_{{ $animal->numero }}" class="animal_existant animal_nom form-control-plaintext" type="text" name="nom" value="{{ $animal->nom }}"></td>

                  <td class="text-center">

                    <button id="btn_animal_numero_{{ $animal->id }}" class="btn btn_animal_edit" type="submit"><i class="fas fa-edit text-secondary"></i></button>

                  </td>

                </form>

                  <td>@supprLigne([
                    'id' => $animal->id,
                    'route' => 'animal.destroy',
                    'texte' => 'form.del',
                    'titre' => 'form.suppr',
                    ])</td>

                  </tr>


            @endforeach
          </tbody>

        </table>

      </div>

    </div>

    <div class="row">

      <div class="col-lg-8 offset-lg-2">

        @retour(['route' => 'troupeau.index'])

      </div>

    </div>

  </div>


@endsection
