@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row justify-content-center my-3">

      <div class="col-md-10 col-lg-8">

        @titre([
          'titre' => "Saisie des résultats",
          'soustitre' => "(".$demande->user->name."&nbsp;: ".$prelevements[0]->demande->anaacte->anatype->abbreviation."- ".$prelevements[0]->demande->anaacte->abbreviation.")"])

      </div>

    </div>

    <form action="{{ route('resultats.store')}}" method="post">
      @csrf

      <input type="hidden" name="demande_id" value="{{ $demande->id }}">

      <div class="row justify-content-center my-3">

        <div class="col-md-10 col-lg-8">

          <div class="form-check">

            <h4 class="color-bleu-tres-fonce">L'analyse est-elle terminée ?</h4>
            <label class="switch">
              <input type="checkbox" name="acheve" checked>
              <span class="slider round"></span>
              <span class="absolute-no">NON</span>
            </label>
          </div>

        </div>

      </div>


      @foreach ($prelevements as $prelevement)

        <div class="row justify-content-center my-3">

          <div class="col-md-10 col-lg-8">

            <div class="card">
              <div class="card-header alert-bleu-tres-fonce">
                <h5>{{ ucfirst($prelevement->identification) }}</h5>
              </div>
              <div class="card-body">

                <table class="table table-bordered table-hover">

                  <thead>

                    <tr>
                       <th>Parasite</th>
                       <th>Quantité</th>
                       <th>Unité</th>
                    </tr>
                  </thead>

                  <tbody>

                    @foreach ($prelevement->analyse->anaitems as $anaitem)

                      @if ($anaitem->unite->type == "quantitatif") {{-- SI la résultats sont des valeurs ou des pourcentages --}}

                        @include('labo.resultats.inputResultatQuantitatif')

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
