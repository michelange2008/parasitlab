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

        @titre(['titre' => __('titres.especeEdit'), 'icone' => 'tout.svg'])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        {!! Form::open(['route' => ['espece.update', $espece->id]]) !!}
          @method('PUT')
          @csrf

          @inputText(['nom' => 'nom', 'label' => 'nom_espece', 'required' => true, 'value' => $espece->nom])

          @inputText([
            'nom' => 'abbreviation',
            'label' => 'abbreviation_espece',
            'maxlength' => 5,
            'required' => true,
            'value' => $espece->abbreviation,
          ])

          <div class="d-inline-flex flex-wrap">

            @foreach ($icones as $icone)

              <div class="d-flex flex-column border m-1 pb-1">
                <label class="" for="icone_{{ $icone->id }}">
                  <img class="img-100px m-3 icone " src="{{ url('storage/img/icones/'.$icone->nom ) }}"
                  alt="{{ $icone->nom }}" data-toggle="tooltip" title="{{ $icone->nom }}">
                </label>
                @if($icone->id == $espece->icone->id)
                  <input type="radio" id="icone_{{ $icone->id }}" name="icone_id" checked value="{{ $icone->id }}">
                @else
                  <input type="radio" id="icone_{{ $icone->id }}" name="icone_id"  value="{{ $icone->id }}">
                @endif
              </div>

            @endforeach

          </div>

          @enregistreAnnule(['nomBouton' => 'boutons.save_edit'])

        {{ Form::close() }}
      </div>

    </div>
  </div>

@endsection
