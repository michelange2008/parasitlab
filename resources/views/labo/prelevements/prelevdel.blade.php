@extends('layouts.app')

@section('content')

  <div class="jumbotron jumbotron-fluid">

    <div class="container">

      <h1 class="display-4" >Etes-vous sûr de vouloir supprimer ce prélèvement ?</h1>

      <p class="lead">Une fois supprimé, ce prélèvement n'existera plus et devra être recréé.</p>

      <hr class="my-4">

      <form class="" action="{{ route('prelevement.destroy', $prelevement_id) }}" method="post">

        @csrf
        @method('delete')

        @enregistreAnnule([
          'nomBouton' => __("boutons.del"),
          'couleur' => 'btn-rouge',
        ])

      </form>

    </div>

  </div>

@endsection
