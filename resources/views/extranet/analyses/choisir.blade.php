@extends('layouts.app')

@section('menu')

  @include("extranet.menuExtranet")

@endsection


@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-12">

        @include('fragments.analysesProgress')

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-12">

        <div id="choisirFirst" session="{{ session('choisirFirst') }}"></div>

        @titre(['titre' => __('titres.choisir_analyse'), 'icone' => 'choisir.svg'])

      </div>

      <div id="choisirExplication" class="col-md-10 my-3">

        @include('extranet.analyses.choisir.pourquoiTantAnalyses')

      </div>

      <div id="choisirEspece" class="col-md-10" style="display:none">

        <div class="col-md-12 my-3">

          @include('extranet.analyses.choisir.titre', ['titre' =>  __('choisir.queltype'), 'soustitre' => __('choisir.cliquerespece')])

        </div>

        <div class="col-md-12 my-3 d-md-flex justify-content-around">
          {{-- ligne cachée pour récupérer l'adressse de icones --}}
          <div id="src_img_espece" lien = "{{ url('storage/img/icones') }}"></div>

          @include('extranet.analyses.choisir.listeEspeces')

        </div>

        @include('extranet.analyses.choisir.listeAges')

      </div>

    </div>


    <div class="row justify-content-center">

      {{-- <div class="col-md-12"> --}}


      {{-- </div> --}}

      <div class="col-md-5">
        <h4 id="titre_observations" class="mb-3"  style="display:none">@lang('choisir.liste_observations')</h4>

        @include('extranet.analyses.choisir.methodeChoixAnalyse')

      </div>

      <div class="col-md-7">

        @include('extranet.analyses.choisir.choisirTuto')

        @include('extranet.analyses.choisir.options')

      </div>

    </div>

</div>


{{-- ########################### NE PAS SUPPRIMER !!! #################################################### --}}
{{-- FORMULAIRE CACHE qui permet la requetee ajax post:: il n'est pas affiché mais joue un role fondamental --}}
<form id="choix_options" class="" action="{{ route('api.selectAnalyses') }}" method="post">
  @csrf

  <input id="input_espece" type="hidden" name="espece" value="">
  <input id="input_age" type="hidden" name="age" value="">
  @foreach ($categories as $categorie)

    <input id="input_{{ $categorie->id }}" type="hidden" name="categorie_{{ $categorie->id }}" value="">

  @endforeach
  <div id="zero-analyse" class="d-none">
  </div>
</form>
{{-- ############################################################################################################# --}}

@endsection

@section('scripts')

  <script src="{{url('js/choisir.js')}}"></script>

@endsection
