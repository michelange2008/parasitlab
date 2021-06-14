@extends('layouts.app')

@section('menu')

  @include("extranet.menuExtranet")

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="m-auto col">

        <div class="card-deck">

          @foreach ($howto as $howone)

            <div class="card">

              <div class="media">

                <img class="img-100px" src="{{ url('storage/img/icones/'.$howone->icone) }}" alt="{{ $howone->name }}">

                <div class="media-body p-3">

                  <h2>{{ $howone->name }}</h2>

                  @bouton([
                    'type' => 'link',
                    'lien' => 'storage/pdf/'.$howone->file,
                    'target' => '_blank',
                    'intitule' => 'boutons.tele_howto',
                    'fa' => "fas fa-file-download"
                  ])


                </div>

              </div>

            </div>

          @endforeach

        </div>

      </div>

    </div>

  </div>

@endsection
