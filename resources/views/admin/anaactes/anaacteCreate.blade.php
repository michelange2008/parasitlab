@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-ld-11 col-lg-1à col-xl-9">

        @titre(['titre' => __('titres.anaacte_create'), 'icone' => 'ajouter.svg'])

      </div>

    </div>

    <form action="{{ route('anaactes.store')}}" method="post">

      @csrf

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <div class="form-group">

          <label for="anatype">@lang('form.anatype')</label>

          <select class="form-control" id="anatype" name="anatype">

            <option>@lang('form.choisir')</option>

            @foreach ($anatypes as $anatype)

              <option value="{{ $anatype->id }}">{{ ucfirst($anatype->nom) }}</option>

            @endforeach

          </select>

        </div>

        <div class="form-row">

          <div class="col-4">

            @inputText([
              'nom' => 'abbreviation',
              'label' => 'anatype_abbreviation',
              'value' => '',
              'maxlength' => 10,
              'required' => true
            ])

          </div>

          <div class="col-8">

            @inputText([
              'nom' => 'nom',
              'label' => 'nom',
              'value' => '',
              'placeholder' => 'anaacte_nom',
              'required' => true
            ])

          </div>

        </div>

        @inputTextarea([
          'nom' => 'description',
          'label' => 'description',
          'value' => '',
          'placeholder' => 'anaacte_description',
          'required' => true
        ])

        <div class="form-row my-3">

          <div class="col border mx-1 p-3">

            @inputOuiNon([
            'name' => 'estSerie',
            'intitule' => "estSerie",
            ])

          </div>

          <div class="col border mx-1 p-3">

            @inputOuiNon([
            'name' => 'estAnalyse',
            'intitule' => "estAnalyse",
            ])

          </div>

          <div class="col border mx-1 p-3">

            @inputOuiNon([
            'name' => 'estTarif',
            'intitule' => "estTarif",
            ])

          </div>

        </div>

        <div class="form-row">

          <div class="col">

            @include('admin.form.inputNumber', [
              'label' => 'cout_anaacte',
              'nom' => 'pu_ht',
              'value' => 0,
              'required' => true,
              'placeholder' => "Indiquez le coût de l'analyse",
            ])

          </div>

          <div class="col">

            @inputText([
              'nom' => 'num',
              'label' => 'anaacte_num_nom',
              'value' => '',
              'placeholder' => 'anaacte_num_nom',
              'required' => true
            ])

          </div>

        </div>

        @include('admin.form.inputChoixIcone')


    </div>

  </div>


    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @enregistreAnnule(['route' => route('anaactes.index')])

      </div>

    </div>

  </form>

</div>

@endsection
