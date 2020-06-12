@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form id='form_icone' action="{{ route('icones.store') }}" method="post" enctype="multipart/form-data">

      @csrf

      <div class="row my-3 justify-content-center">

        <div class="col-ld-11 col-lg-1à col-xl-9">

          @titre(['titre' => __('titres.icone_create'), 'icone' => 'ajouter.svg'])

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          @inputImage(['nouveau' => true, 'name' => 'icone'])

          @inputText(['nom' => 'nom', 'label' => 'nom_icone', 'required' => true, 'value' => ''])

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          <button id='iconeCreate' class="btn btn-bleu" type="button" name="button">@lang('boutons.save')</button>
          @retour(['route' => 'icones.index'])
        </div>

      </div>

    </form>

  </div>

@endsection
