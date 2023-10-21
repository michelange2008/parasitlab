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
            'icone' => 'files.svg',
            'titre' => "Liste des fichiers"
        ])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

        <div class="col-md-10">
  
          @foreach ($db_files as $file)
            
            <div class="media my-3 p-2 border @if ($file->orphelin) bg-warning @else bg-light
              
            @endif">

              <img class="img-50" src="{{ url('storage/img/extensions').'/'.$file->extension.'.svg'}}" alt="Image">

              <div class="media-body">
                <h5 class="mt-0">{{ $file->description }} </h5>
                <p><a src="{{ url('storage') }}" class="font-italic">{{ $file->nom }}</a></p>
                <div>
                @boutonUser([
                  'route' => 'files.edit',
                  'id' => $file,
                  'intitule' => 'demandeModif',
                  'fa' => 'fas fa-pen'
                ])

                </div>
              </div>

            </div>
              
          @endforeach
  
        </div>
  
      </div>
  
  </div>

@endsection
