@extends('layouts.app')

@section('menu')

  @include("extranet.menuExtranet")

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row justify-content-center my-3">

      <div class="col-md-10">

        @titre(['titre' => __('titres.blog_add'), "icone" => 'ajouter.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10">

        {{ Form::model($blog, ['route' => $route, 'enctype' => 'multipart/form-data']) }}

        @method($method)

        <div class="form-row">

          <div class="form-group col-md-6">

            <label for="titre">@lang('parasitisme.blog_title')</label>

            <input class="form-control" type="text" name="titre" id="titre" value="{{ $blog->titre ?? '' }}" required>

            @error('titre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group col-md-4">

            <label for="auteur">@lang('parasitisme.auteur')</label>

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

          <label for="contenu">@lang('parasitisme.content')</label>

          <textarea class="form-control" name="contenu" id="contenu" rows="8" cols="80" placeholder="@lang('parasitisme.content_placeholder')" required>{{ $blog->contenu ?? '' }}</textarea>

        </div>

        <div class="custom-file col-md-8 mb-3">

          @inputImage( ['nouveau' => true, 'name' => 'image'])

        </div>

        <div class="form-group">

          <label for="motclefs">@lang('parasitisme.tags')</label>

          <input class="form-control" type="text" id="motclefs" name="motclefs" placeholder="@lang('parasitisme.tags_placeholder')" value="{{ $blog->liste_motclefs ?? '' }}">

        </div>

        <div class="row my-3">

          <div class="col">

            @enregistreAnnule(['route' => url()->previous()])

          </div>

        </div>



        {{ Form::close() }}

      </div>

    </div>

  </div>

@endsection
