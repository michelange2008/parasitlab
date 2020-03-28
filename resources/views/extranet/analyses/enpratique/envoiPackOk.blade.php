@extends('layouts.app')

@section('content')

  <div class="jumbotron jumbotron-fluid">

    <div class="container">

      <h1 class="display-4">Merci&nbsp;!</h1>
      <p class="lead">Un email vient de nous être envoyé avec vos coodornnées...</p>
      <hr class="my-4">
      <p>Vous allez bientôt recevoir les kits demandés.</p>
      <a class="btn btn-bleu" href="{{ route('accueil') }}">Retour à l'accueil</a>

    </div>

  </div>

@endsection
