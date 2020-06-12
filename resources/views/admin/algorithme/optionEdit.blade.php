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
          {{-- champs caché pour savoir quel partie de l'option on modifie --}}
          <input type="hidden" name="type" value="option">

          <div class="row">
            <div class="col-md-8">
              @include('admin.form.inputText', ['nom' => 'nom', 'label' => 'option_nom', 'required' => true, 'value' => $option->nom])
            </div>
          </div>

          @include('admin.form.inputText', ['nom' => 'titre', 'label' => 'option_titre', 'required' => true, 'value' => $option->titre])
          @include('admin.form.inputTextarea', ['nom' => 'soustitre', 'label' => 'option_soustitre', 'required' => true, 'value' => $option->soustitre])
          @include('admin.form.inputTextarea', [ 'nom' => 'qui', 'label' => 'option_qui', 'required' => true, 'value' => $option->qui])
          @include('admin.form.inputTextarea', [ 'nom' => 'quand', 'label' => 'option_quand', 'required' => true, 'value' => $option->quand])

          <div class="form-row">

            <div class="col-md-12">

              @inputImage( [
                'nouveau' => false,
                'chemin' => 'storage/img/algorithme/',
                'image' => $option->icone,
                'name' => 'icone'
              ])

            </div>

          </div>

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
