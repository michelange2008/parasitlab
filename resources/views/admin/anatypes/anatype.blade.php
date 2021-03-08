@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row justify-content-center mt-3">

      <div class="col-md-9">

        @include('fragments.flash')

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @titre([
          'titre' => $anatype->nom,
          'icone' => $anatype->icone->nom,
        ])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <div class="row row-cols-1 row-cols-md-2">

          @foreach ($anatype->analyses as $analyse)

            <form class="" action="{{ route('analyses.update', $analyse) }}" method="post">

              @method('PUT')

              @csrf
              {{-- prefixe des names de cases à cocher --}}
              <input type="hidden" name="prefixe" value="anaitem">

              <input type="hidden" name="anatype_id" value="{{ $anatype->id }}">

              <div class="col mb-4">

                <div class="card">

                  <div class="card-header d-flex flex-row">

                    <img class="img-50" src="{{ url('storage/img/icones/'.$analyse->espece->icone->nom) }}" alt="{{ $analyse->espece->nom }}">

                    <h5 class="card-title ml-3">{{ ucfirst($analyse->nom) }}</h5>

                  </div>

                  <div class="card-body">

                    @foreach ($anaitems as $anaitem)

                      <div class="form-check">

                        @if ($analyse->anaitems->contains($anaitem))

                          <input class="form-check-input" type="checkbox" name="anaitem_{{ $anaitem->id }}" value="{{ $anaitem->id }}" checked>

                          <label class="form-check-label font-weight-bold" for="{{ $anaitem->nom }}">{{ $anaitem->nom }}</p>

                        @else

                          <input class="form-check-input" type="checkbox" name="anaitem_{{ $anaitem->id }}" value="{{ $anaitem->id }}">

                          <label class="form-check-label" for="{{ $anaitem->nom }}">{{ $anaitem->nom }}</p>

                        @endif

                      </div>


                    @endforeach

                  </div>

                  <div class="card-footer text-right">

                    @include('fragments.boutonEnregistre')

                  </div>

                </div>

              </div>

            </form>

          @endforeach

          </div>

      </div>

    </div>

  </div>

@endsection
