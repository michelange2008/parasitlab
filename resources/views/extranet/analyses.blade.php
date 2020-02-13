@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="m-auto col-md-10 col-lg-8 col-xl-6">

        <div class="card-deck">

          @include('extranet.analyses.carte', [
            'image' => 'choisir.jpg',
            'titre' => 'Quelle analyse choisir ?',
            'texte_1' => "Différentes analyses parasitologiques sont possibles en fonction de vos objectifs et de vos animaux",
            'texte_2' =>  "Il peut s'agit d'une simple coproscopie, d'un suivi, d'un test de résistance, etc.",
            'route' => 'choisir',
          ])

          @include('extranet.analyses.carte', [
            'image' => 'cadrans.jpg',
            'titre' => 'Comment faire en pratique',
            'texte_1' => "Qui prélever, quand, comment ?",
            'texte_2' =>  "Peut-on envoyer les prélèvement ou faut-il les porter au labo ?",
            'route' => 'enpratique',
          ])

        </div>

      </div>

    </div>

  </div>

@endsection
