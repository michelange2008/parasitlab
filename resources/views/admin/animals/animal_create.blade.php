@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @include('fragments.flash')

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre(['titre' => __('boutons.add_animal'), 'icone' => 'tout.svg'])

      </div>

    </div>

    <form class="" action="{{ route('animal.store') }}" method="post">

      @csrf

      <div class="form-row">

        <div class="col-md-1">

        </div>

        <div class="form-group col-md-4">

          @inputChoixEleveur()

        </div>

        <div class="form-group col-md-4">

          @inputChoixTroupeau()

        </div>

        <div class="col-md-1">
          <br>
          <button id="add_troupeau_animal_create" type="button" class="btn btn-success mt-2" name="button" title="@lang('boutons.add_troupeau')" ><i class="fas fa-plus"></i></button>
        </div>

      </div>

      <div class="form-row">

        <div class="col-md-1"></div>

        <div class="form-group col-md-5">

          <label for="num">@lang('form.num') <small>@lang('form.no_num')</small> </label>
          <input id="num_animal_create" class="form-control" type="text" name="numero" value="" required>

        </div>

        <div class="form-group col-md-4">

          <label for="nom" required>@lang('form.nom')</label>
          <input id="nom_animal_create" class="form-control" type="text" name="nom" value="">

        </div>

      </div>

      <div class="form-row">

        <div class="col-md-1"></div>

        @enregistreAnnule(['route' => route('animal.index')])

      </div>

    </form>


  </div>

@endsection


@section('scripts')

  <script src="{{url('js/animalAdd.js')}}"></script>

@endsection
