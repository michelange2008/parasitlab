@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <form class="" action="{{ route('troupeau.update', $troupeau->id) }}" method="post">

    @csrf
    @method('patch')

    <div class="container-fluid">

      <div class="row justify-content-center my-3">

        <div class="col-lg-8">

          @titre(['titre' => __('boutons.modifier')." : ".$troupeau->nom, 'icone' => $troupeau->typeprod->espece->icone->nom, 'soustitre' => "(".$troupeau->user->name.")"])

        </div>

      </div>

      <div class="row">

        <div class="col-lg-8 offset-lg-2">

          <div class="form-group row">

            <label class="col-lg-4 col-form-label" for="nom">@lang('form.edit_nom_troupeau')</label>

            <div class="col-lg-8">

              <input class="form-control" type="text" name="nom" value={{ $troupeau->nom }}>

            </div>

          </div>

        </div>

      </div>

      <div class="row">

        <div class="col-lg-4 offset-lg-2">

          <div class="form-group">


            <select class="form-control" name="espece_id" required>

              <option selected disabled>@lang('form.choix_espece')</option>

              @foreach ($especes as $espece)

                @if ($espece->id === $troupeau->espece->id)

                  <option selected value="{{ $espece->id }}">{{ $espece->nom }}</option>

                @else

                  <option value="{{ $espece->id }}">{{ $espece->nom }}</option>

                @endif

              @endforeach

            </select>

          </div>

        </div>

        <div class="col-lg-4">

          <div class="form-group">

            <select class="form-control" name="typeprod_id" required>

              @foreach ($typeprods as $typeprod)

                @if ($typeprod->id === $troupeau->typeprod->id)

                  <option selected value="{{ $typeprod->id }}">{{ $typeprod->nom }}</option>

                @else

                  <option value="{{ $typeprod->id }}">{{ $typeprod->nom }}</option>

                @endif

              @endforeach

            </select>

          </div>

        </div>

      </div>

      <div class="row">

        <div class="col-lg-8 offset-lg-2">

          @enregistreAnnule()

        </div>

      </div>

    </div>

  </form>


@endsection
