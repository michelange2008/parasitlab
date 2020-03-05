@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-right">

      <div class="col">

          @include('admin.index.index')

      </div>

    </div>

  </div>

@endsection
