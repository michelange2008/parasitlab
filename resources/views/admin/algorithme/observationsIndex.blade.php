@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">
    {{-- Fenêtre modale cachée pour modifier une observation via ajax--}}
    @include('admin.algorithme.observationsModalInfos')

    <div class="row my-3 justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @include('fragments.flash')

        @titre(['titre' => __('titres.algo_observationsIndex'), 'icone' => 'observations.svg'])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <div class="mb-3">

          @boutonUser(['route' => 'observations.create', 'fa' => 'fas fa-plus-square', 'intitule' => 'add_observation'])

          @retour(['route' => route('algorithme.index'), 'intitule' => 'algo_graph', 'fa' => 'fas fa-project-diagram' ])

        </div>

        <table class="table table-striped">

          @foreach ($observations as $observation)

            <tr>
              <td> <img class="img-25" src="{{ url('storage/img/icones/'.$observation->categorie->nom.'.svg') }}" alt=""> </td>

              <td id="ordre_{{ $observation->id }}">{{ $observation->ordre }}</td>

              <td id="intitule_{{ $observation->id }}" class="intitule">

                <a href="{{ route('observations.show', $observation->id) }}"
                data-toggle="tooltip" title="{{ $observation->explication }}"
                >{{ $observation->intitule }}</a>
              </td>

              <td>

                <a href="{{ route('observations.show', $observation->id) }}" data-toggle="tooltip" title="@lang('tooltips.edit_obs')"><i class="text-success fas fa-edit"></i></a>

              </td>

              <td>
                <form id="form_suppr_{{ $observation->id }}" action="{{ route('observations.destroy', $observation->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <a id="suppr_{{ $observation->id }}" class="suppr_item" href="#" data-toggle="tooltip" title="@lang('tooltips.suppr_obs')"><i class="text-danger fas fa-trash-alt"></i></a>

                </form>
              </td>

            </tr>

          @endforeach

        </table>

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @retour(['route' => route('algorithme.index'), 'intitule' => 'algo_graph', 'fa' => 'fas fa-project-diagram' ])

      </div>

    </div>

  </div>

@endsection

@section('scripts')

  <script src="{{url('js/algorithme.js')}}"></script>

@endsection
