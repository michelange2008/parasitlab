@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form action="{{ route('exclusions.store') }}" method="post">

      @csrf

      <div class="row my-3 justify-content-center">

        <div class="col-ld-11 col-lg-10 col-xl-9">

          @titre(['titre' => __('titres.algo_add_exclusion'), 'icone' => 'exclusions.svg'])

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          <h5>@lang('form.choix_espece_age')</h5>

          <div class="form-row my-3">

            <div class="col">

              <select class="form-control" name="animaux" required>

                <option value="" selected>@lang('form.choix_animal')</option>

                @foreach ($especes as $espece)

                  <option value="espece_{{ $espece->id }}">{{ $espece->nom }}</option>

                @endforeach

                @foreach ($ages as $age)

                  <option value="age_{{ $age->id }}">{{ $age->nom }}</option>

                @endforeach

              </select>

            </div>

          </div>

          <h5>@lang('form.choix_observation')</h5>

          <select class="form-control" name="observation" required>

            <option value="" selected>@lang('form.choix_observation')</option>

            @foreach ($observations as $observation)

              <option value="{{ $observation->id }}">{{ $observation->intitule }}</option>

            @endforeach

          </select>

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          <hr class="divider-court">

          <h5>@lang('form.choix_anaacte_exclu')</h5>

          @foreach ($anaactes as $anatype_id => $anaactes)

              <div class="border my-3">

                <div class="bg-bleu text-white p-2">

                  <p class="lead mb-0">{{ ucfirst($anatypes->where('id', $anatype_id)->first()->nom) }}</p>

                </div>

              @foreach ($anaactes as $anaacte)

                <div class="p-3">

                  <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" id="anaacte_{{ $anaacte->id }}" name="anaacte" class="custom-control-input" value="{{ $anaacte->id }}"" required>

                    <label class="custom-control-label" for="anaacte_{{ $anaacte->id }}">{{ ucfirst($anaacte->nom) }}</label>

                  </div>

                </div>

              @endforeach

            </div>

          @endforeach

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          @enregistreAnnule(['route' => route('exclusions.index')])

        </div>

      </div>

    </form>

  </div>

@endsection
