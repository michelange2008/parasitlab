@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form class="" action="{{ route('troupeau.store') }}" method="post">

      @csrf

      <div class="row my-3 justify-content-center">

        <div class="col-lg-8">

          @titre(['titre' => __('titres.troupeauCreate'), 'icone' => 'troupeauCreate.svg'])

        </div>

      </div>

      <div class="row">

        <div class="col-lg-8 offset-lg-2">

          <div class="form-group">

            <select class="form-control" name="user_id" required>

              <option selected disabled>@lang('form.choix_eleveur')</option>

              @foreach ($eleveurs as $eleveur)

                <option value="{{ $eleveur->user->id }}">{{ $eleveur->user->name }}</option>

              @endforeach

            </select>

          </div>

        </div>

      </div>

      <div class="row my-3">

        <div class="col-lg-8 offset-lg-2">

          @inputNomtroupeau()

        </div>

      </div>

      <div class="row">

        <div class="col-lg-4 offset-lg-2">

          @inputEspece()

        </div>

        <div class="col-lg-4">

          @inputTypeprod()

        </div>

      </div>

      <div class="row">

        <div class="col-lg-8 offset-lg-2">

          @enregistreAnnule()

        </div>

      </form>

    </div>

  </div>

@endsection
