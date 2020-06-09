@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-ld-11 col-lg-1à col-xl-9">

        @include('fragments.flash')

        @titre(['titre' => __('titres.algo_optionsIndex'), 'icone' => 'why.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <div class="mb-3">

          @boutonUser(['route' => 'options.create', 'fa' => 'fas fa-plus-square', 'intitule' => 'add_option'])

          @retour(['route' => 'algorithme.index', 'intitule' => 'algo_graph', 'fa' => 'fas fa-project-diagram' ])

        </div>

        <table class="table table-striped">

          <tbody>

            @foreach ($options as $option)

              <tr>
                <td> <img class="img-50" src="{{ url('storage/img/algorithme/'.$option->icone) }}" alt=""> </td>

                <td>
                  <a href="{{ route('options.show', $option->id) }}" data-toggle="tooltip" title="@lang('tooltips.show_option')">
                    {{ $option->nom }}
                  </a>
                </td>

                <td>{{ $option->titre }}</td>

                <td> <a href="{{ route('options.edit', $option->id) }}" data-toggle="tooltip" title="@lang('tooltips.editOption')"><i class="fas fa-edit text-success"></i></a></td>

                <td> <a href="{{ route('option.editAnaacte', $option->id) }}" data-toggle="tooltip" title="@lang('tooltips.editOptionAnaacte')"><i class="fas fa-microscope color-bleu-tres-fonce"></i></a></td>

                <td>

                  <form id="form_suppr_{{ $option->id }}" action="{{ route('options.destroy', $option->id) }}" method="post">

                    @csrf

                    @method('delete')

                    <a id="suppr_{{ $option->id }}" class="suppr_item" href="#" data-toggle="tooltip" title="@lang('tooltips.suppr_obs')"><i class="text-danger fas fa-trash-alt"></i></a>

                  </form>

                </td>

              </tr>

            @endforeach

          </tbody>

        </table>

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @retour(['route' => 'algorithme.index', 'intitule' => 'algo_graph', 'fa' => 'fas fa-project-diagram' ])

      </div>

    </div>

  </div>

@endsection

@section('scripts')

  <script src="{{url('js/algorithme.js')}}"></script>

@endsection
