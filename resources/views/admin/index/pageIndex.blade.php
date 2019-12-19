@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="row">

    @if (session('status'))

      <div class="alert alert-success">

        {{ session('status') }}

      </div>

    @endif

  </div>

  <div class="container-fluid">

    <div class="row mt-3 justify-content-center">

      <div class="col-md-11">

        @include('admin.index.index')

      </div>

    </div>
  </div>

@endsection
