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

          <h5>@lang('form.choix_observation')</h5>

          <select id="observations" class="form-control" name="observation" required>

            <option value="" selected>@lang('form.choix_observation')</option>

            @foreach ($observations as $observation)

              <option value="{{ $observation->id }}">{{ $observation->intitule }}</option>

            @endforeach

          </select>

          <hr class="divider-court">

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-4 col-lg-4 col-xl-3">

          <h5>@lang('form.choix_espece_age')</h5>

          <div class="p-3">

            @foreach ($especes as $espece)

              @if ($ages->whereIn('espece_id', $espece->id)->isEmpty())

                <div class="custom-control custom-checkbox mb-3">

                  <input type="checkbox" id="espece_{{ $espece->id }}" name="espece_{{ $espece->id }}" class="custom-control-input" value="{{ $espece->id }}">

                  <label class="custom-control-label" for="espece_{{ $espece->id }}">{{ ucfirst($espece->nom) }}</label>

                </div>

              @endif

            @endforeach

            <div class="mb-3">----------------------</div>

            @foreach ($ages as $age)

              <div class="custom-control custom-checkbox mb-3">

                <input type="checkbox" id="age_{{ $age->id }}" name="age_{{ $age->id }}" class="custom-control-input" value="{{ $age->id }}">

                <label class="custom-control-label" for="age_{{ $age->id }}">{{ ucfirst($age->nom) }}</label>

              </div>

            @endforeach

          </div>

        </div>

        <div class="col-md-1 col-xl-1"></div>

        <div class="col-md-6 col-lg-5 col-xl-5">

          <h5>@lang('form.choix_anatype_exclu')</h5>

          @foreach ($anatypes as $anatype)

            <div class="p-3">

              <div class="custom-control custom-checkbox custom-control-inline">

                <input type="checkbox" id="anatype_{{ $anatype->id }}" name="anatype_{{ $anatype->id }}" class="custom-control-input" value="{{ $anatype->id }}">

                <label class="custom-control-label" for="anatype_{{ $anatype->id }}">{{ ucfirst($anatype->nom) }}</label>

              </div>

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
