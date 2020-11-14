@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row justify-content-center my-3">

      <div class="col-md-10 col-lg-8">

        @titre([
          'titre' => __('titres.saisie_resultats'),
          'soustitre' => "(".$demande->user->name."&nbsp;: ".$prelevements[0]->demande->anaacte->anatype->abbreviation." - ".$prelevements[0]->demande->anaacte->abbreviation.")"
        ])

      </div>

    </div>

    <form action="{{ route('resultats.store')}}" method="post">
      @csrf

      <input type="hidden" name="demande_id" value="{{ $demande->id }}">

      <div class="row justify-content-center my-3">

        <div class="col-md-10 col-lg-8">

          <div class="form-check">

            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" name="acheve" id="acheve" checked>
              <label class="custom-control-label" for="acheve">@lang('form.estFinie')</label>
            </div>

          </div>

        </div>

      </div>

      @foreach ($prelevements as $prelevement)

        <div class="row justify-content-center my-3">

          <div class="col-md-10 col-lg-8">

            <div class="card">

              @include('labo.resultats.titreResultat')

              <div class="card-body">

                <table class="table table-bordered table-hover">

                  <thead>

                    <tr>
                       <th>@lang('form.parasite')</th>
                       <th>@lang('form.qtt')</th>
                       <th>@lang('form.unit')</th>
                    </tr>
                  </thead>

                  <tbody>

                    @foreach ($prelevement->analyse->anaitems as $anaitem)

                      @if ($anaitem->unite->type == "quantitatif") {{-- SI la résultats sont des valeurs ou des pourcentages --}}

                        @include('labo.resultats.inputResultatQuantitatif')

                      @elseif($anaitem->unite->type == "semi-quantitatif")

                        @include('labo.resultats.inputResultatSemiQuantitatif')

                      @else  {{-- Si les résulats sont qualitatifs "absence"/"présence" --}}

                        @include('labo.resultats.inputResultatQualitatif')

                      @endif

                    @endforeach

                  </tbody>

                </table>

              </div>

            </div>

          </div>


        </div>

        @endforeach

        <div class="row justify-content-center">

          <div class="col-md-10 col-lg-8">

            @include('labo.resultats.inputCommentaire')

          </div>

        </div>

        <div class="row justify-content-center">

          <div class="col-md-10 col-lg-8">

            @enregistreAnnule(['id' => $prelevement->demande->id ])

          </div>

        </div>

      </form>

  </div>

@endsection
