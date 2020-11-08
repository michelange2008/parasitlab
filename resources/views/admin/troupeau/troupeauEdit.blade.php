@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <form class="" action="{{ route('troupeau.update', $troupeau->id) }}" method="post">

    @csrf
    @method('patch')

    <div class="container-fluid">

      <div class="row justify-content-center my-3">

        <div class="col-lg-8">

          @titre(['titre' => __('boutons.modifier')." : ".$troupeau->nom, 'icone' => $troupeau->typeprod->espece->icone->nom, 'soustitre' => "(".$troupeau->user->name.")"])

        </div>

      </div>

      <div class="row">

        <div class="col-lg-8 offset-lg-2">

          @inputNomtroupeau(['troupeau_nom' => $troupeau->nom])

        </div>

      </div>

      <div class="row">

        <div class="col-lg-4 offset-lg-2">

            @inputEspece(['espece_id_anterieure' => $troupeau->espece->id])

       </div>

        <div class="col-lg-4">

          @inputTypeprod(['typeprod_id_anterieure' => $troupeau->typeprod->id])

        </div>

      </div>

      <div class="row">

        <div class="col-lg-8 offset-lg-2">

          @enregistreAnnule()

        </div>

      </div>

    </div>

  </form>


@endsection
