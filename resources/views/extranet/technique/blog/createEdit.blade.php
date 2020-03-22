@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row justify-content-center my-3">

      <div class="col-md-10">

        @titre(['titre' => "Ajouter / modifier un article", "icone" => 'ajouter.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10">

        {{ Form::model($blog, ['route' => $route, 'enctype' => 'multipart/form-data']) }}

        @method($method)

        <div class="form-row">

          <div class="form-group col-md-6">

            <label for="titre">Titre de l'article</label>

            <input class="form-control" type="text" name="titre" id="titre" value="{{ $blog->titre ?? '' }}" required>

            @error('titre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group col-md-4">

            <label for="auteur">Auteur</label>

            <select class="form-control" name="auteur">

              {{-- <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option> --}}

              @foreach ($laboratoires as $laboratoire)

                @if ($laboratoire->id == auth()->user()->id)

                  <option value="{{ $laboratoire->id }}" selected>{{ $laboratoire->name }}</option>

                @else

                  <option value="{{ $laboratoire->id }}">{{ $laboratoire->name }}</option>

                @endif


              @endforeach

            </select>

          </div>

        </div>

        <div class="form-group">

          <label for="contenu">Contenu de l'article</label>

          <textarea class="form-control" name="contenu" id="contenu" rows="8" cols="80" placeholder="tapez votre texte ici" required>{{ $blog->contenu ?? '' }}</textarea>

        </div>

        <div class="custom-file col-md-8 mb-3">

          <input type="file" class="custom-file-input" name="image" id="image">

          <label class="custom-file-label" for="image">Choisissez une image (type jpg ou png)</label>


          @error('image')

            <div class="alert alert-danger">{{ $message }}</div>

          @enderror

        </div>

        <div class="form-group">

          <label for="motclefs">Mots-clefs</label>

          <input class="form-control" type="text" id="motclefs" name="motclefs" placeholder="Tapez ici les mots clefs séparés par un ;" value="{{ $blog->liste_motclefs ?? '' }}">

        </div>

        <div class="row my-3">

          <div class="col">

            @enregistreAnnule()

          </div>

        </div>



        {{ Form::close() }}

      </div>

    </div>

  </div>

@endsection
