@extends('layouts.app')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <h4>Etes-vous sûr de vouloir supprimer ce prélèvement ?</h4>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-auto">

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

  </div>

@endsection
