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

      <div class="row justify-content-center">

        <div class="col-lg-4">

          <div class="form-group">

            <select class="form-control" name="user_id" required>

              <option selected disabled>@lang('form.choix_eleveur')</option>

              @foreach ($eleveurs as $eleveur)

                <option value="{{ $eleveur->user->id }}">{{ $eleveur->user->name }}</option>

              @endforeach

            </select>

          </div>

        </div>

        <div class="col-lg-4">

          <input class="form-control" type="text" name="nom" placeholder="@lang('form.choix_nom_troupeau')">

        </div>

      </div>

      <div class="row">

        <div class="col-lg-4 offset-lg-2">

          <div class="form-group">


            <select class="form-control" name="espece_id" required>

              <option selected disabled>@lang('form.choix_espece')</option>

              @foreach ($especes as $espece)

                <option value="{{ $espece->id }}">{{ $espece->nom }}</option>

              @endforeach

            </select>

          </div>

        </div>

        <div class="col-lg-4">

          <div class="form-group">

            <select class="form-control" name="typeprod_id" required>

              <option selected disabled>@lang('form.choix_typeprod')</option>

              @foreach ($typeprods as $typeprod)

                <option value="{{ $typeprod->id }}">{{ $typeprod->nom }}</option>

              @endforeach

            </select>

          </div>

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
