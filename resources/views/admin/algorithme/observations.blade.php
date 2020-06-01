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

      <div class="col-md-11 col-lg-10 col-xl-9">

        @retour(['route' => 'especes.index'])

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
