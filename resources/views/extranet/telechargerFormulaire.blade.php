@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-10 col-lg-8 mx-auto">

        @titre(['titre' => "Bravo !", 'soustitre' => " Vous avez fini de remplir le formulaire de demande d'analyse", "icone" => 'felicitations.svg'])

      </div>

    </div>

    <div class="row">

      <div class="col-md-10 col-lg-8 mx-auto">

        <p class="lead">Vous pouvez maintenant télécharger le fichier pdf, pour l'imprimer, le signer et le joindre à votre envoi.</p>

        <p>Si vous le souhaitez, vous pouvez <strong>en plus</strong> choisir de nous envoyer ce formulaire par mail pour que nous puissions anticiper l'arrivée de vos prélèvements.</p>


        <div class="custom-control custom-checkbox">

          <input type="checkbox" class="custom-control-input" name="envoiMail" id="envoiMail" value="">

          <label for="envoiMail" class="custom-control-label">Nous envoyer aussi le formulaire par mail</label>

        </div>

      </div>

    </div>

    <div class="row my-3">

      <div id="imprimer" class="col-md-10 col-lg-8 mx-auto">

        @include('fragments.blocAgitAnnule', ['route' => 'formulaire', 'intitule' => 'Imprimer'])

      </div>

      <div id="imprimerEnvoyer" class="col-md-10 col-lg-8 mx-auto" style="display:none">

        @include('fragments.blocAgitAnnule', ['route' => 'formulaireMail', 'intitule' => 'Imprimer + mail'])

      </div>

    </div>

  </div>

@endsection
