@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-ld-11 col-lg-1à col-xl-9">

        @titre(['titre' => __('titres.algo_age_espece'), 'icone' => 'espece.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <table class="table table-stripped">

          @foreach ($especes as $espece)

            @if ($espece->ages->isNotEmpty())

              @foreach ($espece->ages as $age)
                <tr>
                  <td>
                    <img class="img-50" src="{{ url('storage/img/icones/'.$espece->icone->nom) }}" alt="{{ $espece->icone->nom }}">
                    <img class="img-50" src="{{ url('storage/img/icones/'.$age->icone->nom) }}" alt="{{ $age->icone->nom }}">
                  </td>

                  <td>{{ $age->nom }}</td>
                  <td> <a href="{{ route('observations.age', $age->id) }}" data-toggle="tooltip" title="@lang('tooltips.voir_obs_age')"><i class="fas fa-eye"></i></a> </td>
                  <td> <a href="{{ route('anaactes.age', $age->id) }}" data-toggle="tooltip" title="@lang('tooltips.voir_ana_age')"><i class="fas fa-microscope"></i></a> </td>

                </tr>

              @endforeach

            @else

              <tr>
                <td> <img class="img-50" src="{{ url('storage/img/icones/'.$espece->icone->nom) }}" alt="{{ $espece->icone->nom }}"> </td>
                <td>{{ $espece->nom }}</td>
                <td> <a href="{{ route('observations.espece', $espece->id) }}" data-toggle="tooltip" title="@lang('tooltips.voir_obs_esp')"><i class="fas fa-eye"></i></a> </td>
                <td> <a href="{{ route('anaactes.espece', $espece->id) }}" data-toggle="tooltip" title="@lang('tooltips.voir_ana_esp')"><i class="fas fa-microscope"></i></a> </td>

              </tr>

            @endif

          @endforeach

      </table>

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @retour(['route' => 'algorithme.index', 'fa' => 'fas fa-project-diagram', 'intitule' => 'algo_graph'])

      </div>

    </div>

  </div>

@endsection
