@extends('layouts.app')

@section('menu')

  @include("extranet.menuExtranet")

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-lg-8">

        @titre(['titre' => __('titres.envoikit'), 'icone' => 'pack-envoi-vide.svg'])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-lg-8">

        <p>{!! __('veterinaires.kit_envoi_1') !!}</p>

        <p>{!! __('veterinaires.kit_envoi_2') !!}</p>

        <p>{!! __('veterinaires.kit_envoi_prix_1')."&nbsp;".$cout_kit."&nbsp;".__('veterinaires.kit_envoi_prix_2') !!}</p>

        <p>@lang('veterinaires.kit_envoi_info_1')</p>

        <hr class="divider-court">

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-lg-8">

        <form class="" action="{{ route('express.envoiKitStore') }}" method="post">

          @csrf

          <p class="lead">{!! __('formulaires.envoikit_soustitre') !!}</p>

          <div class="row">

            <div class="col-md-8">

              @include('admin.form.identite')

              @include('admin.form.contact')

            </div>

            <div class="col-md-4 border-left">

              <div class="form-group row">

                <label class="col-md-8 col-form-label" for="nb_pack" >{!! __('formulaires.envoikit_1') !!}</label>

                <div class="col-md-4">

                  <input id="nb_pack" class="form-control mx-3 text-center" type="number" name="nb_pack" value="1" min="1" max="10" step="1">

                </div>

              </div>

              <div class="my-3">

                <p class="col-form-label">Espece</p>

                @foreach ($especes as $espece)

                  <div class="custom-control custom-radio">
                    <input id="espece_{{ $espece->id }}" type="radio" name="espece" value="{{ $espece->nom }}" class="custom-control-input" required="">
                    <label class="custom-control-label" for="espece_{{ $espece->id }}">{{ $espece->nom }}</label>
                  </div>

                @endforeach
                <div class="custom-control custom-radio">

                  <input id="espece_toutes" type="radio" name="espece" value="@lang('form.toutes_especes')" class="custom-control-input" required="">
                  <label class="custom-control-label" for="espece_toutes">@lang('form.toutes_especes')</label>
                </div>

              </div>
            </div>

          </div>



          @enregistreAnnule(["nomBouton" => "valider"])

        </form>

      </div>

    </div>

    <br>

  </div>

@endsection
