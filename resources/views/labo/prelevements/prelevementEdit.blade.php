@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form class="" action="{{ route('prelevement.update', $prelevement->id) }}" method="post">

      @csrf

      @method('put')


      <div class="row my-3">

        <div class="col-md-10 mx-auto">

          @titre(['titre' => $prelevement->animal->numero ?? ''." ".$prelevement->identification, 'icone' => $prelevement->demande->espece->icone->nom])

        </div>

      </div>

      <div class="row">

        <div class="col-md-10 offset-md-1">

          <div class="form-group">

            @if ($prelevement->estMelange)

              <p>@lang('form.prelev_coll')</p>

              <label for="identification">@lang('form.nom')</label>

              <input class="form-control" type="text" name="identification" value="{{ $prelevement->identification }}">

            @else

              <h5 for="numero">@lang('form.prelev_indiv')</h5>

              <div class="row">

                <div class="col-md-6">

                  <label for="numero">@lang('form.num')</label>

                  <input class="form-control" type="text" name="numero" value="{{ $prelevement->animal->numero }}" disabled>

                </div>

                <div class="col-md-6">

                  <label for="identification">@lang('form.nom')</label>

                  <input class="form-control" type="text" name="identification" value="{{ $prelevement->identification }}">

                </div>

                <div class="col-md-12">

                  <hr class="divider">

                </div>

              </div>

            </div>

          @endif

        </div>

      </div>

      <div class="offset-md-1 col-md-10">

        @include('labo.demandeForm.inputEtatPrelevement', ['i' => $prelevement->id])

      </div>

      <div class="offset-md-1 col-md-10">

        @include('labo.demandeForm.infosPrelevement', ['i' => $prelevement->id])

      </div>

      <div class="col-md-10 offset-md-1">

        @enregistreAnnule()

      </div>

    </form>

    <div class="col-md-10 offset-md-1">

      <hr class="divider">

    </div>

@endsection
