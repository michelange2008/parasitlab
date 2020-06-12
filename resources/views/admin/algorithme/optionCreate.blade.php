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

              @include('admin.form.inputText', ['nom' => 'abbreviation', 'label' => 'option_abbreviation', 'required' => true, "maxlength" => 15, 'value' =>''])
          </div>
          <div class="col-md-8">

            @include('admin.form.inputText', ['nom' => 'nom', 'label' => 'option_nom', 'required' => true, 'value' => ''])
          </div>

          </div>
          @include('admin.form.inputText', ['nom' => 'titre', 'label' => 'option_titre', 'required' => true, 'value' =>''])
          @include('admin.form.inputText', ['nom' => 'soustitre', 'label' => 'option_soustitre', 'required' => true, 'value' =>''])
          @include('admin.form.inputTextarea', [ 'nom' => 'qui', 'label' => 'option_qui', 'required' => true, 'value' =>''])
          @include('admin.form.inputTextarea', [ 'nom' => 'quand', 'label' => 'option_quand', 'required' => true, 'value' =>''])

          <div class="form-row">

            <div class="col-md-12">

              @inputImage( [
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
