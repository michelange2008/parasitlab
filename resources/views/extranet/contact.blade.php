@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @include('admin.titre', ['titre' => 'Nous contacter', 'icone' => 'contact.svg'])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        <div class="card-deck">

          @include('fragments.carte', [
            'icone' => 'email.svg',
            'titre' => 'Par courriel',
            'texte_1' => "Vous avez un question un peu complexe, nécessitant des explications détaillées...",
            'texte_2' => "N'hésitez pas ! le courrier électronique est fait pour ça.",
            'type' => 'mail',
            'adresse' => 'contact@parasitlab.fr',
            'intitule' => 'Nous écrire',
          ])

          @include('fragments.carte', [
            'icone' => 'telephone.svg',
            'titre' => 'Par téléphone',
            'texte_1' => "Vous souhaitez juste une information sur une analyse en cours, un prélèvement à envoyer, une facture...",
            'texte_2' => "Le téléphone est un bon moyen pour avoir une réponse rapide.",
            'type' => 'phone',
            'intitule' => '04 75 25 41 75',
          ])

          @include('fragments.carte', [
            'icone' => 'depl.svg',
            'titre' => 'Passez nous voir',
            'texte_1' => "Vous souhaitez nous apporter un prélèvement ou juste nous dire bonjour...",
            'texte_2' => "Pôle Bio - Ecosite du Val de Drôme - 150 Av. de Judée - 26400 Eurre ",
            'type' => 'link',
            'fa' => 'fas fa-map-marked-alt',
            'lien' => 'https://www.openstreetmap.org/#map=17/44.73689/4.97671',
            'intitule' => 'Voir sur la carte',
          ])

          @include('fragments.carte', [
            'icone' => 'horaires.svg',
            'titre' => "Horaires et jour d'ouverture",
            'texte_1' => "Du lundi au vendredi",
            'texte_2' => "de 8h30 à 11h30",
            'type' => 'link',
            'fa' => 'fas fa-file-pdf',
            'lien' => url()->route('presentation'),
            'intitule' => 'Toutes les infos',
          ])

      </div>

      </div>

    </div>
    

  </div>

@endsection
