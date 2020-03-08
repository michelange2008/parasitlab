@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-end">

      <div id="facture" class="col-md-4">

        {{-- @include('labo.factures.facture') --}}

      </div>

      <div class="col-md-8">

          @include('admin.index.index')

      </div>

    </div>

  </div>

@endsection
