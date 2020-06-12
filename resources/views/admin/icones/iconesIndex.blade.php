@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-ld-11 col-lg-1à col-xl-9">

        @flash()

        @titre(['titre' => __('titres.icones_titre'), 'icone' => 'icones.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @boutonUser([
          'route' => 'icones.create',
          'fa' => 'fas fa-plus-square',
          'intitule' => 'icone_add',
        ])

        @boutonUser([
          'route' => 'icones.suppr',
          'fa' => 'fas fa-trash-alt',
          'couleur' => 'btn-rouge',
          'intitule' => 'icones_suppr',
        ])

        @retour()

      </div>

      <div class="col-md-11 col-lg-10 col-xl-9">

        @foreach ($icones as $icone)

            <img class="img-100px m-3 icone " src="{{ url('storage/img/icones/'.$icone->nom ) }}" alt="{{ $icone->nom }}" data-toggle="tooltip" title="{{ $icone->nom }}">

        @endforeach

      </div>


    </div>

  </div>

  <div class="row justify-content-center">

    <div class="col-md-11 col-lg-10 col-xl-9">

      @boutonUser([
        'route' => 'icones.create',
        'fa' => 'fas-add',
        'intitule' => 'icone_add',
      ])

      @retour()

    </div>

  </div>

</div>

@endsection
