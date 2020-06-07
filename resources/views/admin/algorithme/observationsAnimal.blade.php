
{{-- page qui affiche la liste des observations pour une espece ou age donné avec possibilité de modifier l'association entre l'espece/age et l'observation
Tout ce fait en jquery avec une requête ajax post pour la mise à jour de la base de données --}}
@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    @include('admin.algorithme.observationsModalInfos')

    <div class="row mt-3 justify-content-center">

      <div class="col-ld-11 col-lg-1à col-xl-9">

        @titre(['titre' => $animal->nom.'&nbsp;:&nbsp;'.__('titres.algo_observations'), 'icone' => $animal->icone->nom])

      </div>

    </div>

    <div class="row justify-content-center mb-3">

      <div class="col-md-11 col-lg-10 col-xl-9 d-flex justify-content-between">

        @retour(['route' => 'especes.index'])

        <div class="">

          @foreach ($especes as $espece)

            @if ($espece->ages->isNotEmpty())

              @foreach ($espece->ages as $age)

                <a href="{{ route('observations.age', $age->id) }}">

                  <img id="age_{{ $age->id }}" class="img-50 tete age" src="{{ url('storage/img/icones/'.$age->icone->nom) }}" alt="{{ $age->icone->nom }}">

                </a>

              @endforeach

            @else

              <a href="{{ route('observations.espece', $espece->id) }}">

                <img id="espece_{{ $espece->id }}" class="img-50 tete espece" src="{{ url('storage/img/icones/'.$espece->icone->nom) }}" alt="{{ $espece->icone->nom }}">

              </a>

            @endif

          @endforeach

        </div>

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <form id="observations" class="" action="{{ route('animalObservationStore') }}" method="post">

          @csrf

          <table class="table table-striped">

            @foreach ($observations as $observation)

              <tr>
                <td> <img class="img-25" src="{{ url('storage/img/icones/'.$observation->categorie->nom.'.svg') }}" alt=""> </td>

                <td id="ordre_{{ $observation->id }}">{{ $observation->ordre }}</td>

                <td id="intitule_{{ $observation->id }}" class="intitule"
                  ordre = "{{ $observation->ordre }}"
                  intitule = "{{ $observation->intitule }}"
                  explication = "{{ $observation->explication }}"
                  autres = "{{ $observation->autres }}"
                  categorie = "{{ $observation->categorie->nom }}"
                  >

                  <a href="#"
                  @if ($observations_actives->contains($observation))
                    class="font-weight-bold"
                  @endif
                  data-toggle="tooltip" title="{{ $observation->explication }}"
                  >{{ $observation->intitule }}</a>
                </td>

                <td class="custom-control custom-checkbox">
                  <input class="checkbox_observation" type="checkbox" name="check_{{ $observation->id }}" id="check_{{ $observation->id }}"
                    @if ($observations_actives->contains($observation))
                      checked
                    @endif
                  >
                </td>
              </tr>

            @endforeach

          </table>

        </form>

      </div>

    </div>

  </div>

@endsection

@section('scripts')

  <script src="{{url('js/algorithme.js')}}"></script>

@endsection
