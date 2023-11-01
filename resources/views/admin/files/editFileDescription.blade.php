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
            'icone' => 'update_file_description.svg',
            'titre' => __('titres.update_fileDescription')
        ])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

        <div class="col-md-10">

          <h3>{{ $file->nom }}</h3>
  
          <form action="{{ route('files.updateFileDescription', $file)}}" method="POST">
            @csrf

            @inputText([
              'nom' => 'description',
              'label' => 'description',
              'type' => 'text',
              'value' => $file->description,
            ])

            @enregistreAnnule(['nomBouton' => 'boutons.update'])

          </form>
  
        </div>
  
      </div>
  
      <div class="row my-3 justify-content-center">

        <div class="col-md-10 lead border p-3 bg-light">

          <p>
            Il s'agit juste de mettre à jour la description d'un fichier, sans modifier le fichier lui-même.
          </p>

        </div>

      </div>
 </div>

@endsection
