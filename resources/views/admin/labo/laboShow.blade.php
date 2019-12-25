@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-4">

        <div class="card" >

          <img class="img-100" src="{{ asset('storage/img/labo/photos')."/".$user->labo->photo}}" alt="">
          <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">{{ $user->email }}</p>
            <p class="card-text">{{ $user->fonction }}</p>
            <img src="{{ asset('storage/img/labo/signatures')."/".$user->labo->signature }}" alt="">
          </div>
        </div>

      </div>

    </div>

  </div>


@endsection
