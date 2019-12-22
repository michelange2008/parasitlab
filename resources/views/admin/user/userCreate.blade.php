@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-xl-8">

        @include('admin.titreCreation')

      </div>

    </div>

      <div class="row my-3 justify-content-center">

        <div class="col-md-10 col-xl-8">

          @include('admin.user.userCreateForm')

        </div>

      </div>

      <div class="row my-3 justify-content-center">

        <div class="col-md-10 col-xl-8">

          <div id="laboCreateForm" class="d-none">

            @include('admin.labo.laboCreateForm')

          </div>

          <div id="eleveurCreateForm" class="d-none">

            @include('admin.eleveur.eleveurCreateForm')

          </div>

          <div id="vetoCreateForm" class="d-none">

            @include('admin.veto.vetoCreateForm')

          </div>

        </div>

      </div>

</div>
@endsection
