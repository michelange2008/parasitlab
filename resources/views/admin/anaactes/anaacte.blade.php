@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @titre([
          'titre' => $anaacte->anatype->nom,
          'soustitre' => '&nbsp;: '.$anaacte->nom,
          'icone' => $anaacte->icone->nom,
        ])

      </div>

      <div class="col-md-11 col-lg-10 col-xl-9">

        @foreach ($anaacte->anatype->analyses as $analyse)

          <div class="card">

            <div class="card-body">

              <h5 class="card-title">{{ $analyse->nom }}</h5>
              @foreach ($analyse->anaitems as $anaitem)

                <p>{{ $anaitem->nom }}</p>

              @endforeach

            </div>

          </div>

        @endforeach

      </div>

    </div>

  </div>

@endsection
