
{{-- Issu d'AnalyseController@create --}}
@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form action="{{ route('analyses.store') }}" method="post">

      @csrf

      <div class="row my-3 justify-content-center">

        <div class="col-ld-11 col-lg-1à col-xl-9">

          @titre(['titre' => __('titres.analyse_create'), 'icone' => 'analyse_nouvelle.svg'])

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          <div class="form-row">

            <div class="col-8">

              @inputText([
                'nom' => 'nom',
                'label' => 'nom',
                'value' => '',
                'required' => true
              ])

            </div>

          </div>

          <div class="form-row">

            <div class="col-md-5">

              @include('admin.form.inputEspece')

            </div>

            <div class="col-md-7">

              @include('admin.form.inputAnatype')


            </div>

          </div>

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
