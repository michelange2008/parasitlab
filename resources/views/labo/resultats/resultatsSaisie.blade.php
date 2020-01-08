@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row justify-content-center my-3">

      <div class="col-md-10 col-lg-8">

        @titre(['titre' => "Saisie des résultats", 'soustitre' => "(".$prelevements[0]->demande->user->name." - ".$prelevements[0]->demande->anapack->nom.")"])

      </div>

    </div>

    <form action="{{ route('resultats.store')}}" method="post">
      @csrf

      <input type="hidden" name="demande_id" value="{{ $prelevements[0]->demande->id }}">

      @foreach ($prelevements as $prelevement)

        <div class="row justify-content-center my-3">

          <div class="col-md-10 col-lg-8">

            <div class="card">
              <div class="card-header">
                <h6>{{ $prelevement->identification }}</h6>
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

                      <tr>
                        <td>
                          {{$anaitem->nom}}
                        </td>

                        <td>
                          @if ($anaitem->unite->type == "quantitatif")

                            <input class="form-control" type="number" name="resultat_{{ $prelevement->id }}_{{ $anaitem->id }}" value="" placeholder="résultat">

                          @else

                            <select class="form-control" name="resultat_{{ $prelevement->id }}_{{ $anaitem->id }}">

                              <option value="absence">Absence</option>

                              <option value="presence">Présence</option>

                            </select>
                          @endif
                        </td>
                        <td class="text-right">
                          {{ $anaitem->unite->nom }}
                        </td>
                      </tr>
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

            @include('fragments.blocEnregistreAnnule', ['id' => $prelevement->demande->id ])

          </div>

        </div>


  </form>

  </div>

@endsection
