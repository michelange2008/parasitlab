@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form id="createAvecTroupeau" action="{{ route('melange.createAvecTroupeau') }}" method="post">

      @csrf

      <div class="row my-3">

        <div class="col-md-10 mx-auto">

          @titre(['titre' => __('titres.melange_create'), 'icone' => 'mela_add.svg'])

        </div>

      </div>

      <div class="form-row">

        <div class="form-group col-md-4 offset-md-1">

          @inputChoixEleveur()

        </div>

        <div class="Form-group col-md-4">

          @inputChoixTroupeau()

        </div>


      <div class="col-md-10 offset-md-1">

        @enregistreAnnule(['nomBouton' => 'boutons.choisir', 'fa' => 'fas fa-check-double'])

      </div>

    </form>

    <div class="col-md-10 offset-md-1">

      <hr class="divider">

    </div>

    <div class="row my-3">

      <div class="col-md-8 mx-auto">

        <div class="card">
          <div class="card-header alert-danger">
            <h5>
              <i class="fas fa-radiation"></i>
              @lang('melange.melange_create_info_titre')
            </h5>
          </div>
          <div class="card-body">
            <p class="lead">@lang('melange.melange_create_info_texte_1')</p>
            <p class="lead">@lang('melange.melange_create_info_texte_2')</p>
          </div>
          <div class="card-footer">
            <a class="btn btn-secondary m-1" href="{{ route('eleveurAdmin.create') }}">
              <i class="fas fa-user-edit"></i>
              @lang('melange.melange_create_info_create_eleveur')
            </a>
            <a class="btn btn-secondary m-1" href="{{ route('troupeau.create') }}">
              <i class="fas fa-plus-circle"></i>
              @lang('melange.melange_create_info_create_troupeau')
            </a>
          </div>
        </div>

      </div>

    </div>

</div>
  @endsection

  @section('scripts')

    <script src="{{url('js/melangeAdd.js')}}"></script>

  @endsection
