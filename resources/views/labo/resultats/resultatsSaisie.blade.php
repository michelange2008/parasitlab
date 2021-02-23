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

    <div class="row">

      <div class="col-md-8 offset-md-2">

        @include('fragments.flash')

      </div>

    </div>

    <div class="row my-3">

      <div class="col-md-auto offset-md-2">

        @bouton([
          'type' => 'route',
          'route' => 'prelevement.createOne',
          'id' => [$demande->id, 1],
          'intitule' => 'boutons.add_one_prel',
          'fa' => "fas fa-plus-square"
        ])

        @retour([
          'route' => route('demandes.show', $demande->id),
        ])

      </div>

    </div>

    <form action="{{ route('resultats.store')}}" method="post">
      @csrf

      <input type="hidden" name="demande_id" value="{{ $demande->id }}">

      <div class="row justify-content-center my-3">

      </div>

      @foreach ($prelevements as $prelevement)

        <div class="row justify-content-center my-3">

          <div class="col-md-10 col-lg-8">

            <div class="card">

              <div class="card-header alert-bleu-tres-fonce d-flex justify-content-between">

                {{-- Titre du prélèvement avec le numéro et le nom de l'animal --}}
                <h5 class="">{{ ucfirst($prelevement->animal->nom ?? $prelevement->identification) }} {{ ucfirst($prelevement->animal->numero ?? '') }}</h5>

              </div>

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
{{ $prelevement->analyse->anaitems }}
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


        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-10 col-lg-8">

          @enregistreAnnule([
          'id' => $prelevement->demande->id,
          "route" => route('demandes.show',$prelevement->demande->id),
          'nomAnnule' => __('boutons.retour')
          ])

        </div>

      </div>

    </form>

  </div>

@endsection
