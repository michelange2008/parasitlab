{{-- Issu d'AnalyseController@edit

--}}
@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form action="{{ route('analyses.update', $analyse->id) }}" method="post">

      @csrf

      @method('put')

      <div class="row my-3 justify-content-center">

        <div class="col-ld-11 col-lg-1à col-xl-9">

          @titre(['titre' => $analyse->nom, 'icone' => $analyse->icone->nom])

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          <div class="form-row">

            <div class="col-8">

              @inputText([
                'nom' => 'nom',
                'label' => 'nom',
                'value' => $analyse->nom,
                'required' => true
              ])

            </div>

          </div>

          <div class="form-row">

            <div class="col-md-5">

              @include('admin.form.inputEditListe', [
                'liste' => $especes,
                'item' => $analyse->espece,
                'id_name' => 'espece_id',
              ])

            </div>

            <div class="col-md-7">

              @include('admin.form.inputEditListe', [
                'liste' => $anatypes,
                'item' => $analyse->anatype,
                'id_name' => 'anatype_id',
              ])
            </div>

          </div>

          @include('admin.form.inputChoixIcone', ['icone' => $analyse->icone])

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
