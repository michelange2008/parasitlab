@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row justify-content-center my-3">

      <div class="col-md-10 col-lg-8">

        @titre(['titre' => "Saisie des résultats", 'soustitre' => "(".$prelevements[0]->demande->user->name." - ".$prelevements[0]->demande->anapack->nom.")"])

      </div>

    </div>

    <form action="{{ route('demandes.update', $prelevements[0]->demande->id)}}" method="post">
      @csrf

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

                        </td>
                        <td>
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



  </form>

  </div>

@endsection
