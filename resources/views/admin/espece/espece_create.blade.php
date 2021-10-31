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

        @titre(['titre' => __('titres.especeCreate'), 'icone' => 'tout.svg'])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        <form id='form_espece' action="{{ route('espece.store') }}" method="post" enctype="multipart/form-data">
          @csrf

          @inputText(['nom' => 'nom', 'label' => 'nom_espece', 'required' => true, 'value' => ''])

          @inputText(['nom' => 'abbreviation', 'label' => 'abbreviation_espece', 'required' => true, 'value' => ''])

          {{-- @inputText(['nom' => 'icone', 'label' =>'icone_espece', 'required' => true, 'value' => '']) --}}

          <div class="d-inline-flex flex-wrap">
          @foreach ($icones as $icone)
            <div class="d-flex flex-column border m-1 pb-1">
              <label class="" for="icone_{{ $icone->id }}">
                <img class="img-100px m-3 icone " src="{{ url('storage/img/icones/'.$icone->nom ) }}" alt="{{ $icone->nom }}" data-toggle="tooltip" title="{{ $icone->nom }}">
              </label>
              <input type="radio" id="icone_{{ $icone->id }}" name="icone_id"  value="{{ $icone->id }}">
            </div>
            @endforeach
            </div>

            @enregistreAnnule()
        </form>

      </div>

    </div>
  </div>

@endsection
