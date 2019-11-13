@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container">
    <div class="row my-3">
      <div class="col-md-10 mx-auto alert alert-bleu">
        <h3>{{ $eleveur->name }}</h3>
      </div>
    </div>
  </div>

@endsection
