@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @titre(['titre' => $observation->intitule, 'icone' => $observation->categorie->nom.'.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <p class="text-secondary">@lang('form.explication')</p>
        <p class="ml-3 font-weight-bold">{{ $observation->explication }}</p>
        <p class="text-secondary">@lang('form.autres_causes')</p>
        @if ($observation->autres == null)
          <p class="ml-3 font-italic">@lang('algorithme.zero_autre')</p>
        @endif
        <p class="ml-3 font-weight-bold">{{ ucfirst($observation->autres) }}</p>

        @boutonUser(['route' => 'observations.edit', 'id' => $observation->id, 'couleur' => 'btn-bleu', 'fa' => 'fas fa-edit', 'intitule' => 'modifier'])

      </div>

    </div>

    <hr class="divider-court">

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">
        <div class="card-deck">

          <div class="card">

            <div class="card-body">

              <h5 class="card-title text-secondary">@lang('algorithme.animalObsTitreAvec')</h5>

              @foreach ($observation->especes as $espece)

                <img src="{{ url('storage/img/icones/'.$espece->icone->nom) }}" alt="{{ $espece->nom }}">

              @endforeach

              @foreach ($observation->ages as $age)

                <img src="{{ url('storage/img/icones/'.$age->icone->nom) }}" alt="{{ $espece->age }}">

              @endforeach

            </div>

            <div class="card-footer">

                @boutonUser(['route' => 'observation.editAnimal', 'id' => $observation->id, 'couleur' => 'btn-bleu', 'fa' => 'fas fa-edit', 'intitule' => 'modifier'])

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <hr class="divider-court">

          <p class="text-secondary">@lang('algorithme.anatypeObsTitreAvec')</p>
            <table class="table">
              <thead>
                <th>@lang('tableaux.analyse')</th>
                <th>@lang('algorithme.poids')</th>
              </thead>
              <tbody>
                @foreach ($liste_anatypes as $anatype => $poids)
                <tr>
                  <td>
                    <p class="mb-0 ml-2">{{ $anatype }}</p>
                  </td>
                  <td>
                    <p class="mb-0 ml-2">{{ $poids }}</p>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>

            @boutonUser(['route' => 'observation.editAnatype', 'id' => $observation->id, 'couleur' => 'btn-bleu', 'fa' => 'fas fa-edit', 'intitule' => 'modifier'])

      </div>


    </div>

    <hr class="divider-court">

    <div class="row">

      <div class="mx-auto col-md-11 col-lg-10 col-xl-9">

        @retour(['route' => route('observations.index')])

      </div>

    </div>

  </form>

  <div class="row my-3">

  </div>

</div>

@endsection
