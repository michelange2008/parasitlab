@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-10 offset-md-1">

        @titre(['titre' => __('titres.export_result'), 'icone' => 'export.svg'])

      </div>

    </div>

    <form id="choix" class="" action="{{ route('exports.comptage') }}" method="post">

      @csrf


      <div class="row">

        <div class="col-md-5 offset-md-1">

          <div class="form-group">

            <label for="format">@lang('form.format_export')</label>

            <select idea="format" class="form-control" name="format">

              @foreach ($formats as $format)

                <option value="{{ $format->extension }}">{{ $format->nom }}</option>

              @endforeach

            </select>

          </div>

        </div>

        <div class="col-md-2">

          <div class="form-group">

            <label for="de">@lang('form.from')</label>

            <input class="form-control" type="date" name="de" value="{{ $de }}" min="{{ $de }}" max="{{ $a }}">

          </div>

        </div>

        <div class="col-md-2">

          <div class="form-group">

            <label for="a">@lang('form.to')</label>

            <input class="form-control" type="date" name="a" value="{{ $a }}" min="{{ $de }}" max="{{ $a }}">

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
              'intitule' => 'espèces',
              ])

            </div>

            <div class="col-md-12">

              @include('exports.form.selectPersonne', [
              'type' => 'Eleveur.euse',
              'personnes' => $eleveurs,
              'name' => 'eleveur',
              ])

            </div>

            <div class="col-md-12 my-3">

              @include('exports.form.selectPersonne', [
              'type' => 'Vétérinaires',
              'personnes' => $vetos,
              'name' => 'veto',
              ])

            </div>

          </div>

        </div>

        <div class="col-md-5 my-3">

          <div class="row">

            <div class="col-md-12">

              @include('exports.form.selectMultiple', [
              'datas' => $anaitems,
              'for' => 'anaitems',
              'intitule' => 'parasites',
              ])

            </div>


          </div>

        </div>

      </div>

      <div class="row">

        <div class="col-md-5 offset-md-1">

          @enregistreAnnule(['nomBouton' => "Exporter", 'fa' => 'fas fa-file-export', 'route' => route('laboratoire')])

        </div>

        <div class="col-md-5" id="nb_enregistrements">



        </div>


      </div>

    </form>

  </div>

@endsection
