@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-11">

        @include('admin.index')

      </div>

    </div>

  </div>
@endsection
