@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form action="{{ route('anaactes.animalUpdate', $animal->id) }}" method="post">

      @csrf

      @method('put')

      <input type="hidden" name="type" value="{{ $type }}">


      <div class="row my-3 justify-content-center">

        <div class="col-ld-11 col-lg-1à col-xl-9">

          @include('fragments.flash')

          @titre(['titre' => $animal->nom, 'icone' => $animal->icone->nom])

        </div>

      </div>

      <div class="row justify-content-center my-3">

        <div class="col-md-11 col-lg-10 col-xl-9 d-flex justify-content-between">

          <div>

            @enregistreAnnule(['route' => route('especesAlgo.index')])

            @retour(['route' => 'algorithme.index', 'fa' => 'fas fa-project-diagram', 'intitule' => 'algo_graph'])

          </div>


          <div>

            @include('admin.algorithme.choixAnimal', ['route' => 'anaactes'])

          </div>

        </div>

      </div>

      <div class="row justify-content-center my-3">

        <div class="col-md-11 col-lg-10 col-xl-9">

          <h5>@lang('algorithme.animal_anaactes_avec')</h5>

          <ul class="list-group my-3 font-weight-bold">

            @foreach ($anatypes as $anatype)

              @if ($animal->anaactes->intersect($anatype->anaactes)->count() > 0)

                <li class="list-group-item bg-secondary text-white">

                  <img class="img-50" src="{{ url('storage/img/icones/'.$anatype->icone->nom) }}" alt="">

                  <span class="ml-1">{{ ucfirst($anatype->nom) }}</span>

                  @foreach ($anatype->anaactes as $anaacte)

                    @if ($animal->anaactes->contains($anaacte))

                      <li class="list-group-item">

                        <div class="d-flex flex-row justify-content-between">

                          <span class="ml-3 pl-3">{{ ucfirst($anaacte->nom) }}</span>

                          <input type="checkbox" name="anaacte_{{ $anaacte->id }}" checked>

                        </div>

                      </li>

                    @endif

                  @endforeach

                </li>

              @endif

            @endforeach

          </ul>

          <hr class="divider-court">

          <h5>@lang('algorithme.animal_anaactes_sans')</h5>

          <ul class="list-group">

            @foreach ($anatypes as $anatype)

              @if ($animal->anaactes->intersect($anatype->anaactes)->count() == 0)

                <li class="list-group-item bg-secondary text-white">

                  <img class="img-50" src="{{ url('storage/img/icones/'.$anatype->icone->nom) }}" alt="">

                  <span class="ml-1">{{ ucfirst($anatype->nom) }}</span>

                  @foreach ($anatype->anaactes as $anaacte)

                    @if (!$animal->anaactes->contains($anaacte))

                      <li class="list-group-item">

                        <div class="d-flex flex-row justify-content-between">

                          <span class="ml-3 pl-3">{{ ucfirst($anaacte->nom) }}</span>

                          <input type="checkbox" name="anaacte_{{ $anaacte->id }}">

                        </div>

                      </li>

                    @endif

                  @endforeach

                </li>

              @endif

            @endforeach

          </ul>
        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9"></div>

      </div>

    </form>

  </div>

@endsection
