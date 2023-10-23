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
            'icone' => 'edit_file.svg',
            'titre' => __('titres.update_file')
        ])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

        <div class="col-md-10">

          <h3>{{ $file->nom }}</h3>
  
          <form action="{{ route('files.update', $file)}}" method="POST" enctype='multipart/form-data'>
            @csrf

            <input type="hidden" name="old_file" value={{ $file->nom }} >

            <div class="custom-file my-3">
              <label class="custom-file-label" for="customFile">@lang('form.choisir_new_file')</label>
              <input type="file" class="custom-file-input" id="customFile" name="new_file" placeholder="{{ $file->nom }}" required>
            </div>            
            

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
            Attention, il s'agit juste de mettre à jour un fichier. 
            Le nouveau remplacera l'ancien qui sera supprimé.
          </p>
          <p>
            Le nouveau fichier doit être du même type (pdf par exemple) que l'ancien, 
            sinon un message d'erreur sera retourné.
          </p>

        </div>

      </div>
 </div>

@endsection
