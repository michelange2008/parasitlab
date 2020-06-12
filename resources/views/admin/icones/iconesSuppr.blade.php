@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-ld-11 col-lg-1à col-xl-9">

        @flash()

        @titre(['titre' => __('titres.icones_suppr'), 'icone' => 'icones.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @retour(['route' => 'icones.index'])

      </div>

      <div class="col-md-11 col-lg-10 col-xl-9">

        @foreach ($icones as $icone)

          <form id="icone_suppr_{{ $icone->id }}" class="d-inline" action="{{ route('icones.destroy', $icone->id) }}" method="post">

            @csrf

            @method('delete')

            <img id="{{ $icone->id }}" class="img-100px m-3 icone icone_del" src="{{ url('storage/img/icones/'.$icone->nom ) }}" alt="{{ $icone->nom }}" data-toggle="tooltip" title="{{ $icone->nom }}">

          </form>

        @endforeach

      </div>


    </div>

  </div>

  <div class="row justify-content-center">

    <div class="col-md-11 col-lg-10 col-xl-9">


      @retour()

    </div>

  </div>

</div>

@endsection
