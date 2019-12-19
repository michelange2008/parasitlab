{{-- ISSU DE DemandeController@index --}}
@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">
    <div class="row">
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
    </div>
    <div class="row mt-3 justify-content-center">

      <div class="col-md-11">

        @include('admin.index')

      </div>

    </div>

  </div>



@endsection
