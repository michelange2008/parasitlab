@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="row">

    @include('fragments.flash')

  </div>

  <div class="container-fluid">

    <div class="row mt-3 justify-content-center">

      <div class="col-md-11">

        @include('admin.index.index')

      </div>

    </div>
  </div>

@endsection
