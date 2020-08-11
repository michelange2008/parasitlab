@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-ld-11 col-lg-1à col-xl-9">

        @include('fragments.flash')

        @titre(['titre' => __('titres.algo_exclusions'), 'icone' => 'exclusions.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @boutonUser(['route' => 'exclusions.create', 'intitule' => 'add_exclusion', 'fa' => 'fas fa-plus-square'])

        @retour(['route' => 'algorithme.index', 'intitule' => 'algo_graph', 'fa' => 'fas fa-project-diagram' ])

      </div>

    </div>

    <div class="row justify-content-center my-3">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <table class="table">

          <tbody>

            @foreach ($observations as $observation)
              {{-- Si cette observation est dans la liste des exclusions --}}
              @if ($exclusions->where('observation_id', $observation->id)->count() > 0)
                {{-- on l'affiche --}}
                <tr class="bg-bleu-clair text-white">

                  <td>
                    <img class="img-50" src="{{ url('storage/img/icones/'.$observation->categorie->nom.'.svg') }}" alt="">
                  </td>

                  <td>
                    <h5 class="mt-2">{{  $observation->intitule }}</h5>
                  </td>

                  <td class="align-middle">
                    {{-- suppression de toutes les exclusions liées à une observation --}}
                    @supprExclusion([
                    'exclusion_id' => 'formdestroyObservation_'.$observation->id,
                    'route' => route('exclusions.destroyObservation', $observation->id),
                    'color' => 'white',
                    ])
                  </td>

                </tr>

                {{-- puis on passe en revue toutes les especes --}}
                @foreach ($especes as $espece)
                  {{-- si l'espèce à des âges --}}
                  @if ($liste_especes_avec_age->contains($espece->id))
                    {{-- On passe en revue les ages de cette espèce --}}
                    @foreach ($ages->where('espece_id', $espece->id) as $age)
                      {{-- s'il y a une exclusion liée à cette observation, cet age --}}
                      @if ($exclusions->where('observation_id', $observation->id)->where( 'age_id', $age->id)->count() > 0)
                        {{-- dans de cas on affiche l'age --}}
                        <tr>

                          <td style="width:50px">
                            <img class="img-50" src="{{ url( 'storage/img/icones/'.$age->icone->nom ) }}" alt="{{ $age->icone->nom }}">
                          </td>

                          <td>
                            <h4 class="mt-2 color-bleu-tres-fonce">{{ $age->nom }}</h4>
                          </td>

                          <td class="align-middle">
                            {{-- suppression de toutes les exclusions liées à une observation --}}
                            @supprExclusion([
                            'exclusion_id' => 'formDestroyAge_'.$observation->id.$age->id,
                            'route' => route('exclusions.destroyAge', [ $observation->id, $age->id ]),
                            'color' => '#0A425A',
                            ])
                          </td>

                        </tr>

                        {{-- et enfin on affiche la liste des anatypes --}}
                        @foreach ($exclusions->where('observation_id', $observation->id)->where( 'age_id', $age->id) as $exclusion)

                          <tr>
                            <td></td>

                            <td class="text-secondary">{{ ucfirst($exclusion->anatype->nom) }}</td>

                            <td>
                              @supprExclusion([
                              'exclusion_id' => 'form_'.$exclusion->id,
                              'route' => route('exclusions.destroy', $exclusion->id),
                              'color' => 'gray',
                              ])
                            </td>

                          </tr>

                        @endforeach

                      @endif

                    @endforeach
                    {{-- mais si l'espece n'a pas d'age --}}
                  @else
                    {{-- et qu'il existe des exclusions avec cette observation et cette espece --}}
                    @if ($exclusions->where('observation_id', $observation->id)->where('espece_id', $espece->id)->count() > 0)
                      {{-- on affiche l'espèce --}}
                      <tr>

                        <td style="width:50px">
                          <img class="img-50" src="{{ url('storage/img/icones/'.$espece->icone->nom) }}" alt="{{ $espece->icone->nom }}">
                        </td>

                        <td>
                          <h4 class="mt-2 color-bleu-tres-fonce">{{ $espece->nom }}</h4>
                        </td>

                        <td class="align-middle">
                          {{-- suppression de toutes les exclusions liées à une observation --}}
                          @supprExclusion([
                          'exclusion_id' => 'formDestroyEspece_'.$observation->id.$espece->id,
                          'route' => route('exclusions.destroyEspece', [ $observation->id, $espece->id ]),
                          'color' => '#0A425A',
                          ])
                        </td>

                      </tr>

                      {{-- et enfin on affiche la liste des anatypes --}}
                      @foreach ($exclusions->where('observation_id', $observation->id)->where('espece_id', $espece->id) as $exclusion)

                        <tr>

                          <td></td>

                          <td class="text-secondary">{{ ucfirst($exclusion->anatype->nom) }}</td>

                          <td>
                            @supprExclusion([
                            'exclusion_id' => 'form_'.$exclusion->id,
                            'route' => route('exclusions.destroy', $exclusion->id),
                            'color' => 'gray',
                            ])
                          </td>

                        </tr>

                      @endforeach

                    @endif

                  @endif

                @endforeach

              @endif

            @endforeach

          </tbody>

        </table>

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @boutonUser(['route' => 'exclusions.create', 'intitule' => 'add_exclusion', 'fa' => 'fas fa-plus-square'])

        @retour(['route' => 'algorithme.index', 'intitule' => 'algo_graph', 'fa' => 'fas fa-project-diagram' ])

      </div>

    </div>

  </div>

@endsection
