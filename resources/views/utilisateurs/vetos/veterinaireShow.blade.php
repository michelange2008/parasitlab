@extends('layouts.app')

@section('menu')

  @include('extranet.menuExtranet')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-end">

      <div class="col-md-3">

        @include('utilisateurs.pagePerso')

        @include('utilisateurs.vetos.boutonRetourAnalyses')

      </div>

      <div class="col-md-9">

        @titre(['titre' => __('titres.veterinaire_mesinfos'), 'icone' => 'acte.svg'])

        <form id="modif_veterinaire" action="{{ route('veterinaire.update') }}" method="post">

          @csrf

          <input type="hidden" name="id" value="{{ $user->id }}">

          @include('admin.form.inputName')

          @include('admin.form.inputEmail')

          @include('admin.form.inputAdresse')

          @include('admin.form.inputTelephone')

          @include('admin.form.inputCro')


          <hr class="divider">

          <div id='modifie' class="btn btn-bleu my-3" name="edit"><i class="fas fa-edit"></i> @lang('boutons.modifier')</div>

          <button id='valide' class="btn btn-rouge my-3" type="submit" name="edit" style="display:none"><i class="fas fa-save"></i> @lang('boutons.save')</button>

        </form>

      </div>

    </div>

  </div>

@endsection
