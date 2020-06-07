@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-ld-11 col-lg-1à col-xl-9">

        @titre(['titre' => __('titres.algo_addOption'), 'icone' => 'why.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <form action="{{ route('options.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-4">

              @include('admin.algorithme.inputText', ['nom' => 'abbreviation', 'label' => 'Abbreviation (en 15 car. max)', 'required' => true, "maxlength" => 15, 'value' =>''])
          </div>
          <div class="col-md-8">

            @include('admin.algorithme.inputText', ['nom' => 'nom', 'label' => 'Nom (en deux ou trois mots)', 'required' => true, 'value' => ''])
          </div>

          </div>
          @include('admin.algorithme.inputText', ['nom' => 'titre', 'label' => 'Titre (Ce qui apparaît à l\'utilisateur)', 'required' => true, 'value' =>''])
          @include('admin.algorithme.inputText', ['nom' => 'soustitre', 'label' => 'Sous-titre (Une description plus détaillée)', 'required' => true, 'value' =>''])
          @include('admin.algorithme.inputTextarea', [ 'nom' => 'qui', 'label' => 'Qui prélever', 'required' => true, 'value' =>''])
          @include('admin.algorithme.inputTextarea', [ 'nom' => 'quand', 'label' => 'Quand prélever', 'required' => true, 'value' =>''])

          <div class="form-row">

            <div class="col-md-12">

              @include('admin.form.inputImage', [
                'nouveau' => true,
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


      </div>

    </div>

  </div>

@endsection

@section('scripts')

  <script src="{{ url('js/inputImage.min.js') }}"></script>

@endsection
