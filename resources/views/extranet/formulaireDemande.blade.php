@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row mt-3">

      <div class="mx-auto col-md-10 col-lg-8">

        @include('fragments.titre', ['titre' => "Création d'un formulaire de demande d'analyse", "icone" => "modifier.svg"])

      </div>

      <div class="mx-auto col-md-10 col-lg-8">

        <p class="lead">{{ __('accueil.remplirFormulaire') }}</p>
        <p><i class="fas fa-exclamation-circle text-danger"></i> {{ __('accueil.signerDemande') }}</p>
        <p>
          {{ __('accueil.remplirMain') }}
          <a href="{!! asset('storage/pdf/formulaire_vierge.pdf') !!}" download="Demande analyse.pdf"><i class="fas fa-file-pdf text-danger"></i></a>
        </p>

        <hr class="divider">

      </div>

    </div>

    <form class="form" novalidate action="{{ route('formulaireStore') }}" method="post">

      <div class="row">

        <div class="col-md-10 col-lg-8 mx-auto">

          @csrf

          @include('extranet.formulaireDemande.infosGenerales')

          <br>

          @include('extranet.formulaireDemande.infosAnapack')

        </div>

      </div>

      <div class="row my-3">

        <div class="col-md-10 col-lg-8 mx-auto">

          @include('fragments.blocEnregistreAnnule', ['nomBouton' => 'afficher le PDF'])

        </div>

      </div>

    </form>

  </div>

@endsection
