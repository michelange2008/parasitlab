@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @include('fragments.flash')

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre(['titre' => $animal->numero.' '.$animal->nom, 'icone' => $animal->troupeau->espece->icone->nom])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        <div class="card">

          <div class="card-header">

            <div class="row">

              <div class="col-md-6">

                @include('admin.animals.animal_edit_form')

              </div>

              <div class="col-md-6">

                <p>
                  {{ $animal->troupeau->user->name }}
                </p>
                <p>
                  <span class="text-muted">Troupeau: </span>
                  <span class="lead">{{ $animal->troupeau->nom }}</span>
                </p>
                <p>
                  <span class="text-muted">Production: </span>
                  <span class="lead">{{ $animal->troupeau->typeprod->nom }}</span>
                </p>

              </div>

            </div>

          </div>

          <div class="card-body">

            @if ($prelevements->count() == 0)

              <p class="lead">@lang('tableaux.aucun_prelev_demande')</p>
              <p class="lead">@lang('tableaux.poss_suppr_animal')</p>

              @supprimer([
              'route' => 'animal.destroy',
              'id' => $animal->id,

              ])

            @else
              <p class="lead">@lang('tableaux.demandes_animal')</p>


              <table class="table">
                <thead>
                  <th>@lang('tableaux.demande_analyse')</th>
                  <th>@lang('tableaux.date_reception_analyse')</th>
                  <th>@lang('tableaux.estMelange')</th>
                  <th>@lang('tableaux.resultat_analyse')</th>
                </thead>
                <tbody>
                  @foreach ($prelevements as $prelevement)
                    <tr>
                      <td>{{ ucfirst($prelevement->demande->anaacte->anatype->nom) }}</td>
                      <td>
                        @if ($prelevement->demande->acheve)
                          {{  \Carbon\Carbon::parse($prelevement->demande->date_analyse)->isoFormat('D MMM Y')  }}</td>
                        @else
                          {{  \Carbon\Carbon::parse($prelevement->demande->date_reception)->isoFormat('D MMM Y')  }}</td>
                        @endif
                        <td>@include('fragments.ouinon', ['condition' => $prelevement->estMelange])</td>
                        <td>
                          @if ($prelevement->demande->acheve)
                            @foreach ($prelevement->resultats as $resultat)
                              @if ($resultat->positif)
                                <p>
                                  {{ $resultat->anaitem->nom }} : <strong>{{ $resultat->valeur }}</strong>
                                </p>
                              @endif
                            @endforeach
                          </td>
                        @else
                          Analyse non terminée
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>

              @endif

            </div>

          </div>

        </div>

      </div>

    </div>

  @endsection
