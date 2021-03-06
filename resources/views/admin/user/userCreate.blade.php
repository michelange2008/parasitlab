@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">


    <div class="row">

      @include('fragments.flash')

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-xl-8">

        @include('admin.titreCreationUser')

      </div>

    </div>

      <div class="row justify-content-center">

        <div class="col-md-10 col-xl-8">

          @include('admin.user.userCreateForm')

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-10 col-xl-8">

          @foreach ($usertypes as $usertype) {{--  BOUCLE POUR AFFICHER LES TROIS FORMULAIRES DE DETAIL DES USERS--}}
{{--AU DEPART LES FORMULAIRES NE SONT PAS AFFICHÉS (c'est le js create.js qui va les afficher en fonction du type d'user créé) --}}
            <div id="{{$usertype->code}}CreateForm" class="d-none">
{{--le code de l'usertype sert à définir le fichier blade inclu et sa localisation ex: admin.labo.laboCreateUser --}}
              @include('admin.'.$usertype->code.'.'.$usertype->code.'CreateForm')

            </div>

          @endforeach

        </div>

      </div>

</div>
@endsection
