@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="m-auto col-md-8 col-xl-6">

        @titre(['titre' => $user->name, 'soustitre' => " : modification des informations"])

      </div>

    </div>

    <div class="row">

      <div class="m-auto col-md-8 col-xl-6 border">

        @include('admin.veto.vetoEditForm')

      </div>

    </div>

  </div>




@endsection
