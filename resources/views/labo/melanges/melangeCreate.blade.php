@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-10 mx-auto">

        @titre(['titre' => __('titres.melange_create_suite'), 'icone' => 'mela_add.svg'])

      </div>

    </div>

    <div class="row">

      <div class="col-md-10 offset-md-1">

        <div class="media">
          <img class="mr-3" src="{{ url('storage/img/icones/'.$troupeau->espece->icone->nom) }}" alt="espece/species">
          <div class="media-body">
            <h5 class="mt-0">{{ $troupeau->user->name }}</h5>
            Troupeau: {{ $troupeau->nom }}
          </div>
        </div>

      </div>

    </div>

      <div class="form-row">

        <div class="col-md-10 offset-md-1">

          <hr class="divider">

          <h5>@lang('melange.animal_to_add')</h5>

          <hr class="divider">
          <p class="font-weight-bold" colspan="3">Ajouter un nouvel animal</p>
          <form id="form_addAnimal" action="index.html" method="post">

            @csrf

            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <input id="numero" class="form-control" type="text" name="numero" value="" placeholder="@lang('tableaux.num')">
                  </td>
                  <td>
                    <input id="nom" class="form-control" type="text" name="nom" value="" placeholder="@lang('tableaux.nom')">
                  </td>
                  <td>
                    <div id="add_animal" class="btn btn-success">
                      <i class="fas fa-plus-square"></i>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>

          </form>

        </div>

      </div>

      <form action="{{ route('melange.store') }}" method="post">

        @csrf

      <div class="form-row">

        <div class="col-md-10 offset-md-1">

          <p class="font-weight-bold" colspan="3">Ajouter des animaux déjà enregistrés</p>

          <table class="table table-hover">

            <thead>

              <th>@lang('tableaux.num')</th>
              <th>@lang('tableaux.nom')</th>
              <th>@lang('tableaux.add_to_melange')</th>

            </thead>

            <tbody>
              @foreach ($animals as $animal)

                <tr>
                  <td><label for="choix_{{ $animal->id }}">{{ $animal->numero }}</label></td>
                  <td><label for="choix_{{ $animal->id }}">{{ $animal->nom }}</label></td>
                  <td>
                    <input id="choix_{{ $animal->id }}" type="checkbox" name="choix_{{ $animal->id }}" value="{{ $animal->id }}">
                  </td>
                </tr>

              @endforeach
            </tbody>

          </table>

        </div>

        <div class="form-group col-md-10 offset-md-1">

          <label for="nom_melange">Nom du mélange</label>
          <input id="troupeau_id" type="hidden" name="troupeau_id" value="{{ $troupeau->id }}">
          <input id="nom_melange" class="form-control" type="text" name="nom_melange" required>


        </div>

        <div class="col-md-10 offset-md-1">

          @enregistreAnnule()

        </div>

    </div>

  </form>

  @endsection

  @section('scripts')

    <script src="{{url('js/animalCreate.js')}}"></script>

  @endsection
