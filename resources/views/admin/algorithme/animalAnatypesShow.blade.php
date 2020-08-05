@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form action="{{ route('anatypes.animalUpdate', $animal->id) }}" method="post">

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

            @include('admin.algorithme.choixAnimal', ['route' => 'anatypes'])

          </div>

        </div>

      </div>

      <div class="row justify-content-center my-3">

        <div class="col-md-11 col-lg-10 col-xl-9">

          <h5>@lang('algorithme.animal_anatypes_avec')</h5>

          <ul class="list-group my-3 font-weight-bold">

            @foreach ($anatypes as $anatype)

              @if ($animal->anatypes->intersect($anatype->where('id', $anatype->id)->get())->count() > 0)

                <li class="list-group-item">

                  <div class="d-flex flex-row justify-content-between">

                    <div class="d-flex flex-row justify-content-start">

                      <img class="img-50" src="{{ url('storage/img/icones/'.$anatype->icone->nom) }}" alt="">

                      <span class="ml-3 pt-2 pl-3">{{ ucfirst($anatype->nom) }}</span>

                    </div>

                    <input type="checkbox" name="anatype_{{ $anatype->id }}" checked>

                  </div>

                </li>

              @endif

            @endforeach

          </ul>

          <hr class="divider-court">

          <h5>@lang('algorithme.animal_anatypes_sans')</h5>

          <ul class="list-group">

            @foreach ($anatypes as $anatype)

              @if ($animal->anatypes->intersect($anatype->where('id', $anatype->id)->get())->count() == 0)

                <li class="list-group-item">

                  <div class="d-flex flex-row justify-content-between">

                    <div class="d-flex flex-row justify-content-start">

                      <img class="img-50" src="{{ url('storage/img/icones/'.$anatype->icone->nom) }}" alt="">

                      <span class="ml-3 pt-2 pl-3">{{ ucfirst($anatype->nom) }}</span>

                    </div>

                    <input type="checkbox" name="anatype_{{ $anatype->id }}">

                  </div>

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
