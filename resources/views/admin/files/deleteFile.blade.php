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

        @titre([
            'icone' => 'delete_file.svg',
            'titre' => __('titres.del_file')
        ])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 d-flex">

        <h3>Fichier: {{ $file->nom }}</h3>

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 d-flex">

      <img src="{{ url('storage/img/courbet.jpg')}}" alt="Courbet">

      </div>

    </div>

  <div class="row my-3 justify-content-center">

        <div class="col-md-10 d-flex">
  
          @supprimer([
            'route' => 'files.destroy',
            'id' => $file->id,
          ])

          @retour()
        </div>
  
      </div>
  
  </div>

@endsection
