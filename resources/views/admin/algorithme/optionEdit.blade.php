@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-ld-11 col-lg-1à col-xl-9">

        @titre(['titre' => $option->nom, 'icone' => 'why.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <form action="{{ route('options.update', $option->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <input type="hidden" name="type" value="option">
          <div class="row">
            <div class="col-md-8">
              @include('admin.algorithme.inputText', ['nom' => 'nom', 'label' => 'Nom (en deux ou trois mots)', 'required' => true, 'value' => $option->nom])
            </div>
          </div>

          @include('admin.algorithme.inputText', ['nom' => 'titre', 'label' => 'Titre (Ce qui apparaît à l\'utilisateur)', 'required' => true, 'value' => $option->titre])
          @include('admin.algorithme.inputText', ['nom' => 'soustitre', 'label' => 'Sous-titre (Une description plus détaillée)', 'required' => true, 'value' => $option->soustitre])
          @include('admin.algorithme.inputTextarea', [ 'nom' => 'qui', 'label' => 'Qui prélever', 'required' => true, 'value' => $option->qui])
          @include('admin.algorithme.inputTextarea', [ 'nom' => 'quand', 'label' => 'Quand prélever', 'required' => true, 'value' => $option->quand])

          @enregistreAnnule(['route' => route('options.index')])

        </form>


      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @retour(['route' => 'options.index'])

      </div>

    </div>

  </div>

@endsection
