@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-10 offset-md-1">

        @titre(['titre' => 'Exportation de résultats', 'icone' => 'export.svg'])

      </div>

    </div>

    <form class="" action="{{ route('exports.export') }}" method="post">

      @csrf


      <div class="row">

        <div class="col-md-5 offset-md-1">

          <div class="form-group">

            <label for="format">Format de fichier à l'export</label>

            <select idea="format" class="form-control" name="format">

              @foreach ($formats as $format)

                <option value="{{ $format->id }}">{{ $format->nom }}</option>

              @endforeach

            </select>

          </div>

        </div>

        <div class="col-md-2">

          <div class="form-group">

            <label for="de">Depuis</label>

            <input class="form-control" type="month" name="de" value="">

          </div>

        </div>

        <div class="col-md-2">

          <div class="form-group">

            <label for="a">Jusqu'à</label>

            <input class="form-control" type="month" name="a" value="">

          </div>

        </div>

      </div>

      <div class="row">

        <div class="col-md-5 offset-md-1">

          <div class="row">

            <div class="col-md-12 my-3">

              @include('exports.form.selectMultiple', [
              'datas' => $especes,
              'for' => 'especes',
              'intitule' => 'Espèces',
              ])

            </div>

            <div class="col-md-12">

              @include('exports.form.selectPersonne', [
              'type' => 'Eleveur.euse',
              'personnes' => $eleveurs,
              ])

            </div>

            <div class="col-md-12 my-3">

              @include('exports.form.selectPersonne', [
              'type' => 'Vétérinaires',
              'personnes' => $vetos,
              ])

            </div>

          </div>

        </div>

        <div class="col-md-5 my-3">

          @include('exports.form.selectMultiple', [
          'datas' => $anaitems,
          'for' => 'parasites',
          'intitule' => 'Parasites',
          ])

        </div>

      </div>

      <div class="row">

        <div class="col-auto offset-md-1">

          @enregistreAnnule(['nomBouton' => "Exporter", 'fa' => 'fas fa-file-export'])

        </div>

      </div>

    </form>

  </div>

@endsection
