@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    @include('admin.algorithme.observationsModalInfos')

    <div class="row my-3 justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @titre(['titre' => __('titres.algo_observationsIndex'), 'icone' => 'observations.svg'])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

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
                categorie = "{{ $observation->categorie->nom }}">

                <a href="#"
                data-toggle="tooltip" title="{{ $observation->explication }}"
                >{{ $observation->intitule }}</a>
              </td>

              <td class="custom-control custom-checkbox">
                <input class="checkbox_observation" type="checkbox" name="check_{{ $observation->id }}" id="check_{{ $observation->id }}">
              </td>

            </tr>

          @endforeach

        </table>

      </div>

    </div>

  </div>

@endsection

@section('scripts')

  <script src="{{url('js/algorithme.js')}}"></script>
    
@endsection
