@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-11">

        @include('admin.userTitre', ['usertype' => $vetos[0]->user->userType, 'titre' => 'Liste des vétérinaires'])

      </div>

      <div class="col-md-11">

        @include('admin.usersTableau', ['user' => $vetos, 'intitules' => $intitulesVetos])

      </div>

    </div>

  </div>
@endsection
