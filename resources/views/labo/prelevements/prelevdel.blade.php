@extends('layouts.app')

@section('content')

  <div class="jumbotron jumbotron-fluid">

    <div class="container">

      <h1 class="display-4" >@lang('demandes.del_prel_confirm_titre')</h1>

      <p class="lead">@lang('demandes.del_prel_confirm_texte')</p>

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
