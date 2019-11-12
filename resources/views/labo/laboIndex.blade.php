@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif

@endsection
