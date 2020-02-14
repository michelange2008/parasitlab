@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row mt-3">

      <div class="mx-auto col-md-10 col-lg-8">

        @include('fragments.titre', ['titre' => "Création d'un formulaire de demande d'analyse", "icone" => "modifier.svg"])

      </div>

      <div class="mx-auto col-md-10 col-lg-8">

        <p class="lead">Vous pouvez remplir ce formulaire de demande d'analyse et imprimer ensuite le fichier pdf créé pour le joindre à votre demande.</p>
        <p><i class="fas fa-exclamation-circle text-danger"></i> N'oubliez pas de signer la demande avant de la joindre au prélèvement.</p>
        <p>
          Vous pouvez aussi remplir le formulaire à la main en imprimant un modèle vierge en cliquant sur ce lien
          <a href="{{ route('formulaireVierge') }}"><i class="fas fa-file-pdf text-danger"></i></a>
        </p>

        <hr class="divider">

      </div>

    </div>

    <div class="row">

      <div class="col-md-10 col-lg-8 mx-auto">

        <form class="" action="{{ route('formulaireStore') }}" method="post">

          @csrf

            {{-- @include('extranet.formulaireDemande.inputIdentite') --}}
            @include('admin.form.identite')

            @isset($user->eleveur)

              @include('admin.form.contact', ['personne' => $user->eleveur])

              @include('admin.form.infosEleveur', ['personne' => $user->eleveur])

            @else

              @include('admin.form.contact')

              @include('admin.form.infosEleveur')


            @endisset


          @include('fragments.blocEnregistreAnnule', ['nomBouton' => 'afficher le PDF'])

        </form>

      </div>

    </div>

  </div>

@endsection
