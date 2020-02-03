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
            'texte_2' => "N'hésitez pas ! le courrier électronique est fait pour ça.<",
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
            'intitule' => '07 75 00 00 00',
          ])

      </div>

      </div>

    </div>

  </div>

@endsection
