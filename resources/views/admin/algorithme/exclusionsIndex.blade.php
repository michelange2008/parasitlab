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

        @retour(['route' => 'algorithme.index'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @foreach ($exclusions as $espece_id => $niveau_espece)

          @if ($ages->contains('espece_id', $espece_id))

            <div class="media my-3 bg-bleu-clair p-1 text-white">

              <img class="img-50" src="{{ url('storage/img/icones/'.$ages->where('espece_id', $espece_id)->first()->icone->nom) }}" alt="{{ $ages->where('espece_id', $espece_id)->first()->icone->nom }}">

              <div class="media-body">

                <h4 class="ml-3 mt-2">{{ $ages->where('espece_id', $espece_id)->first()->nom }}</h4>

              </div>

            </div>

          @else

            <div class="media my-3 bg-bleu-clair p-1 text-white">

              <img class="img-50" src="{{ url('storage/img/icones/'.$especes->where('id', $espece_id)->first()->icone->nom) }}" alt="{{ $especes->where('id', $espece_id)->first()->icone->nom }}">

              <div class="media-body">

                <h4 class="ml-3 mt-2">{{ $especes->where('id', $espece_id)->first()->nom }}</h4>

              </div>

            </div>

          @endif

          @foreach ($niveau_espece as $observation_id => $niveau_observation)

            <div class="media my-1">

              <img class="img-25" src="{{ url('storage/img/icones/'.$observations->where('id', $observation_id)->first()->categorie->nom.'.svg') }}" alt="">

              <div class="media-body color-bleu-tres-fonce">

                <h5>{{  $observations->where('id', $observation_id)->first()->intitule }}</h5>

              </div>

            </div>

            <table class="table">

              <tbody>

                @foreach ($niveau_observation as $anatype_id => $exclusion)

                  <tr>

                    <td class="text-secondary">{{ ucfirst($exclusion->anaacte->anatype->nom) }}</td>
                    <td>{{ ucfirst($exclusion->anaacte->nom) }}</td>
                    <td class="text-right">
                      <form id="form_{{ $exclusion->id }}" class="suppr"
                        titre = "Suppression d'exclusion"
                        texte = "Etes-vous sûr de supprimer cette exclusion ?"
                        action = "{{ route('exclusions.destroy', $exclusion->id) }}"
                        method="post">

                        @csrf
                        @method('delete')

                        <a href="#"><i class="text-danger fas fa-trash-alt"></i></a>
                      </form>
                    </td>


                  </tr>

                @endforeach

              </tbody>

            </table>

          @endforeach

        @endforeach

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @boutonUser(['route' => 'exclusions.create', 'intitule' => 'add_exclusion', 'fa' => 'fas fa-plus-square'])

        @retour(['route' => 'algorithme.index'])

      </div>

    </div>

  </div>

@endsection
