@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form action="{{ route('anatypes.store') }}" method="post">

      @csrf

      <div class="row my-3 justify-content-center">

        <div class="col-ld-11 col-lg-1à col-xl-9">

          @titre(['titre' => __('titres.anatype_create'), 'icone' => 'analyse_nouvelle.svg'])

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

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
                'required' => true
              ])

            </div>

          </div>

          @inputText([
            'nom' => 'technique',
            'label' => 'anatype_technique',
            'value' => '',
            'required' => true
          ])

          @include('admin.form.inputOuiNon', [
            'name' => 'estAnalyse',
            'intitule' => 'estAnalyse',
          ])

          @include('admin.form.inputChoixIcone')

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          @enregistreAnnule()

        </div>

      </div>

    </form>

  </div>

@endsection
