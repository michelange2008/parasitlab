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

      @include('admin.troupeau.troupeauCreateDetail')

      <div class="row">

        <div class="col-lg-8 offset-lg-2">

          @enregistreAnnule()

        </div>

      </div>

    </form>

  </div>

@endsection
