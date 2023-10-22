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
            'icone' => 'add_file.svg',
            'titre' => __("titres.add_file")
        ])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

        <div class="col-md-10">
          
          <form action="{{ route('files.store')}}" method="POST" enctype='multipart/form-data'>
            @csrf

            @inputFile(['nouveau' => true, 'name' => 'file'])
            @inputText([
              'nom' => 'description',
              'label' => 'description',
              'type' => 'text',
              'value' => '',
            ])
          <div class="form-control">
            <input type="checkbox" name="requis">
            <label for="requis">Le fichier est indispensable</label>
          </div>

            @enregistreAnnule()
          </form>
  
        </div>
  
      </div>
  
  </div>

@endsection
