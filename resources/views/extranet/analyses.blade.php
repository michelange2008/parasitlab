@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="m-auto col">

        <div class="card-deck">

          @include('extranet.analyses.carte', [
            'image' => 'cardiaque.jpg',
            'titre' => 'Pourquoi faire des coproscopies&nbsp?',
            'texte_1' => "Vous voulez confirmer une suspicion de parasitisme ou suivre les effets de votre plan de gestion du parasitisme&nbsp;?",
            'texte_2' =>  "Découvrez les principes, les méthodes, les limites des coproscopies",
            'route' => 'coproscopies',
          ])

          @include('extranet.analyses.carte', [
            'image' => 'choisir.jpg',
            'titre' => 'Quelle analyse choisir&nbsp?',
            'texte_1' => "Différentes analyses parasitologiques sont possibles en fonction de vos objectifs et de vos animaux",
            'texte_2' =>  "Il peut s'agit d'une simple coproscopie, d'un suivi, d'un test de résistance, etc.",
            'route' => 'choisir',
          ])

          @include('extranet.analyses.carte', [
            'image' => 'cadrans.jpg',
            'titre' => 'Comment faire en pratique&nbsp?',
            'texte_1' => "Qui prélever, quand, comment&nbsp;?",
            'texte_2' =>  "Peut-on envoyer les prélèvement ou faut-il les porter au labo&nbsp;?",
            'route' => 'enpratique',
          ])

          @include('extranet.analyses.carte', [
            'image' => 'falaise.jpg',
            'titre' => 'Quelle interprétation&nbsp?',
            'texte_1' => "Vous avez reçu votre résultats... comment interpréter&nbsp;?",
            'texte_2' =>  "Quelques éléments pour vous permettre de replacer ces résultats dans le contexte de votre élevage.",
            'route' => 'interpreter',
          ])

        </div>

      </div>

    </div>

  </div>

@endsection
