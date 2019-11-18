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
    <div class="row">
        <div class="col">
          @include('labo.demandesTableau', [
            'intitules' => $intitules,
            'demandes' => $demandes,
          ])
        </div>
    </div>

  </div>



@endsection
